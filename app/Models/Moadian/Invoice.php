<?php

namespace App\Models\Moadian;

use App\Moadian\InvoiceHeader;
use App\Moadian\Payment;
use App\Models\Moadian\InvoiceItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_DRAFT = 'draft';
    const STATUS_SENT_SUCCESS = 'sent-success';
    const STATUS_SENT_FAIL = 'sent-fail';
    const STATUS_VERIFY_SUCCESS = 'verify-success';
    const STATUS_VERIFY_PENDING = 'verify-pending';
    const STATUS_VERIFY_FAIL = 'verify-fail';
    const STATUS_EXPIRED = 'expired';

//    const INS_TYPE_MAIN = 'main';
//    const INS_TYPE_CORRECTIVE = 'corrective';
//    const INS_TYPE_CANCELLATION = 'cancellation';
//    const INS_TYPE_RETURNED = 'returned';

    protected $fillable = [
        'user_id',
        'taxpayer_id',
        'customer_id',
        'status',
        'username',
        'private_key',
        'send_response',
        'verify_response',
        'verify_response',
        'send_error',
        'verify_error',
        'sent_at',
        'verified_at',
        'number',
        'uid',
        'refrence_number',
        'taxid',
        'indatim',
        'indati2m',
        'inty',
        'inno',
        'irtaxid',
        'inp',
        'ins',
        'tins',
        'tob',
        'bid',
        'tinb',
        'sbc',
        'bpc',
        'bbc',
        'ft',
        'bpn',
        'scln',
        'scc',
        'cdcn',
        'cdcd',
        'crn',
        'billid',
        'tprdis',
        'tdis',
        'tadis',
        'tvam',
        'todam',
        'tbill',
        'tonw',
        'torv',
        'tocv',
        'setm',
        'cap',
        'insp',
        'tvop',
        'tax17',
    ];

    private $send_fields = [
        'taxid',
        'indatim',
        'indati2m',
        'inty',
        'inno',
        'irtaxid',
        'inp',
        'ins',
        'tins',
        'tob',
        'bid',
        'tinb',
        'sbc',
        'bpc',
        'bbc',
        'ft',
        'bpn',
        'scln',
        'scc',
        'cdcn',
        'cdcd',
        'crn',
        'billid',
        'tprdis',
        'tdis',
        'tadis',
        'tvam',
        'todam',
        'tbill',
        'tonw',
        'torv',
        'tocv',
        'setm',
        'cap',
        'insp',
        'tvop',
        'tax17',
        ];

    public function taxpayer(){
        return $this->belongsTo(Taxpayer::class, 'taxpayer_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function items(){
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    public function payments(){
        return $this->hasMany(InvoicePayment::class, 'invoice_id');
    }





    public function toMoadianInvoice() : \App\Moadian\Invoice{
        $header = new InvoiceHeader($this->username);
        foreach ($this->send_fields as $key)
            $header->$key = $this->$key;
        $moadianInvoice = new \App\Moadian\Invoice($header);

        foreach ($this->items as $item)
            $moadianInvoice->addItem($item->toMoadianItem());


        if (count($this->payments) > 0) {
            foreach ($this->payments as $payment)
                $moadianInvoice->addPayment($payment->toModaianPayment());
        }else{
            $payment = new Payment();
            $payment->trn = null;
            $payment->pdt = null;
            $moadianInvoice->addPayment($payment);
        }

        return $moadianInvoice;
    }
}
