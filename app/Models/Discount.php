<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'code',
        'discount_type',
        'amount',
        'expired_at',
        'count',
        'used',
        'users',
        'type',
        'description'
    ];

    const TYPE_ALL = 'all';
    const TYPE_PUBLIC = 'public';
    const TYPE_INFINITE = 'infinite';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
