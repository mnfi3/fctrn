<?php

namespace App\Models\Moadian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'taxTpStoPartCode',
        'type',
        'date',
        'specialOrGeneral',
        'taxableOrFree',
        'vat',
        'vatCustomPurposes',
        'descriptionOfId',
        'countingUnit',
    ];
}
