<?php

namespace App\Models\Moadian;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    const TYPE_INDIVIDUAL = 1;
    const TYPE_LEGAL = 2;
    const TYPE_PARTICIPATION = 3;
    const TYPE_FOREIGN = 4;
    const TYPE_CONSUMER= 5;

    protected $fillable = [
        'user_id',
        'taxpayer_id',
        'name',
        'type',
        'national_code',
        'economic_code',
        'postal_code',
        'phone',
        'email',
        'address',
        'state',
        'city',
        'insert_number',
        'fax',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function taxpayer(){
        return $this->belongsTo(Taxpayer::class, 'taxpayer_id');
    }

    public function invoices(){
        return $this->hasMany(Invoice::class, 'customer_id');
    }
}
