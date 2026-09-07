<?php

namespace App\Models\Moadian;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPublicPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'cost',
        'all_count',
        'remain_count',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
