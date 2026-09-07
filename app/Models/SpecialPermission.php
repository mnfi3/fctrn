<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialPermission extends Model
{
    use HasFactory, SoftDeletes;


    const VIEW_ADMIN_DASHBOARD = 'view-admin-dashboard';
    const VIEW_ICT_DASHBOARD = 'view-ict-dashboard';
    const VIEW_MINISTRY_SUPERVISOR_PANEL = 'view-ministry-supervisor-dashboard';
    const VIEW_TOKEN_MANAGER_DASHBOARD = 'view-token-manager-dashboard';



    protected $fillable = [
      'name',
      'description'
    ];
}
