<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Moadian\Customer;
use App\Models\Moadian\Invoice;
use App\Models\Moadian\Taxpayer;
use App\Models\Moadian\UserInfinitePackage;
use App\Models\Moadian\UserPublicPackage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'national_code',
        'mobile',
        'email',
        'referral_id',
        'password',
        'is_admin_register',
        'register_cost',
        'is_payed_register_cost',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function taxpayers(){
        return $this->hasMany(Taxpayer::class, 'user_id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function customers(){
        return $this->hasMany(Customer::class, 'user_id');
    }

    public function invoices(){
        return $this->hasMany(Invoice::class, 'user_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'user_id');
    }

    public function infinitePackages(){
        return $this->hasMany(UserInfinitePackage::class, 'user_id');
    }

    public function publicPackages(){
        return $this->hasMany(UserPublicPackage::class, 'user_id');
    }
}
