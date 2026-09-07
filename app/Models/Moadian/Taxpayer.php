<?php

namespace App\Models\Moadian;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxpayer extends Model
{
    use HasFactory, SoftDeletes;

    const TYPE_COMPANY = 'company';
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'national_id',
        'postal_code',
        'economic_code',
        'address',
        'phone',
        'username',
        'private_key',
        'public_key',
        'state',
        'city',
        'fax',
        'insert_number',
        'bank_account_number',
        'bank_shba_number',
        'bank_name',
        'bank_account_name',
        'logo_image',
        'sign_image',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function invoices(){
        return $this->hasMany(Invoice::class, 'taxpayer_id');
    }
}
