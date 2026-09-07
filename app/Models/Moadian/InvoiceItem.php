<?php

namespace App\Models\Moadian;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Psy\Exception\TypeErrorException;

class InvoiceItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'taxpayer_id',
        'invoice_id',
        'sstid',
        'sstt',
        'am',
        'mu',
        'nw',
        'fee',
        'cfee',
        'cut',
        'exr',
        'ssrv',
        'sscv',
        'prdis',
        'dis',
        'adis',
        'vra',
        'vam',
        'odt',
        'odr',
        'odam',
        'olt',
        'olr',
        'olam',
        'consfee',
        'spro',
        'bros',
        'tcpbs',
        'cui',
        'cop',
        'vop',
        'bsrn',
        'tsstam',
    ];

    private $send_fields = [
        'sstid',
        'sstt',
        'am',
        'mu',
        'nw',
        'fee',
        'cfee',
        'cut',
        'exr',
        'ssrv',
        'sscv',
        'prdis',
        'dis',
        'adis',
        'vra',
        'vam',
        'odt',
        'odr',
        'odam',
        'olt',
        'olr',
        'olam',
        'consfee',
        'spro',
        'bros',
        'tcpbs',
        'cui',
        'cop',
        'vop',
        'bsrn',
        'tsstam',
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

    public function toMoadianItem() : \App\Moadian\InvoiceItem{
        $item = new \App\Moadian\InvoiceItem();
        foreach ($this->send_fields as $key) {
            try {
                $item->$key = $this->$key;
            } catch (\Throwable $e) {
                continue;
            }
        }
        return $item;
    }
}
