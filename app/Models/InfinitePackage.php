<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfinitePackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'desc',
        'cost',
        'day_count',
    ];
}
