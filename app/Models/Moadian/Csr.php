<?php

namespace App\Models\Moadian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Csr extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'type',
        'company_name',
        'company_english_name',
        'national_id',
        'mobile',
        'email',
        'private',
        'public',
        'csr',
        'x509',
        'file',
        'errors',
    ];
}
