<?php

namespace App\Console\Commands;

use App\Moadian\Moadian;
use App\Models\Moadian\Invoice;
use Illuminate\Console\Command;

class FactorVerifier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:verify-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'verify invoices after 1 hour';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time1 = date("Y-m-d H:i:s", strtotime('-1 hours'));
        $time2 = date("Y-m-d H:i:s", strtotime('-5 hours'));
        $invoices = Invoice::whereIn('status', [Invoice::STATUS_SENT_SUCCESS, Invoice::STATUS_VERIFY_PENDING])
            ->where('sent_at', '<=', $time1)
            ->where('sent_at', '>=', $time2)
            ->get();
        foreach ($invoices as $invoice){
            try {
                $moadian = new Moadian($invoice->username, $invoice->private_key);
                $result = $moadian->inquiryByReferenceNumbers([$invoice->refrence_number]);
                $info = $result->getBody();
                $invoice->verify_response = json_encode($info, JSON_UNESCAPED_UNICODE);
                $invoice->verified_at = date('Y-m-d H:i:s');
                $info = $info[0];
                $invoice->verified_error = $info['errorCode'] ?? '' . '#'. $result->getError();

                if ($info['status'] == 'SUCCESS') $invoice->status = Invoice::STATUS_VERIFY_SUCCESS;
                elseif($info['status'] == 'FAILED') $invoice->status = Invoice::STATUS_VERIFY_FAIL;
                else $invoice->status = Invoice::STATUS_VERIFY_PENDING;

                $invoice->save();

            }catch (\Exception $e){}
        }
    }
}
