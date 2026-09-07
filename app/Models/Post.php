<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','photo_id','slug','title','content','meta_keywords','meta_description','status','category','preview','readtime'];

    public function media()
    {
        return $this->belongsTo(Media::class,'photo_id');
    }
}

