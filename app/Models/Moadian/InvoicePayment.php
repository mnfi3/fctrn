<?php

namespace App\Models\Moadian;

use App\Moadian\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'taxpayer_id',
        'invoice_id',
        'iinn',
        'acn',
        'trmn',
        'pmt',
        'trn',
        'pcn',
        'pid',
        'pdt',
        'pv',
    ];

    private $send_fields = [
        'iinn',
        'acn',
        'trmn',
        'pmt',
        'trn',
        'pcn',
        'pid',
        'pdt',
        'pv',
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function taxpayer(){
        return $this->belongsTo(Taxpayer::class, 'taxpayer_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toMoadianPayment() : Payment{
        $payment = new Payment();
        foreach ($this->send_fields as $key)
            $payment->$key = $this->$key;
        return $payment;
    }
}
