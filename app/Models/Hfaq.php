<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hfaq extends Model
{
    use HasFactory;

    protected $fillable = ['title','user_id'];

    public function zirsfaq()
    {
        return $this->hasMany('app\Models\Hfaq','header_id','id');
    }
}
