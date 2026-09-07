<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    const ADMIN = 'admin';
    const ACCOUNTANT = 'accountant';


    const TYPE_PUBLIC = 'public';
    const TYPE_PRIVATE = 'private';



    protected $fillable = [
      'name',
      'persian_name',
      'permissions',
      'special_permissions',
      'redirect_route',
      'type',
    ];


    public function users(){
      return $this->belongsToMany(User::class, 'user_roles');
    }


}
