<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfinitePakcage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'cost',
        'day_count',
    ];
}
