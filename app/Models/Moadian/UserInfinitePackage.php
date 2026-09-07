<?php

namespace App\Models\Moadian;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInfinitePackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'taxpayer_id',
        'cost',
        'from_date',
        'to_date',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function taxpayer(){
        return $this->belongsTo(Taxpayer::class, 'taxpayer_id');
    }

    public function isValid(){
        $now = date('Y-m-d H:i:s');
        if ($now < $this->to_date && $now > $this->from_date)
            return true;
        return false;
    }
}
