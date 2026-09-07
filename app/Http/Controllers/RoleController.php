<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\SpecialPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('access');
  }


  public function index(){
    $roles = Role::all();
    return view('manager.rolls', compact('roles'));
  }

  public function edit($id){
    $role = Role::find($id);
    $routes = [];
    $routeCollection = Route::getRoutes();
    foreach ($routeCollection as $item) {
      if(strlen($item->getName()) > 1)
        $routes[] =  $item->getName();
    }
    sort($routes);
    $special_permissions = SpecialPermission::all();
    return view('manager.edit-roll', compact('role', 'routes', 'special_permissions'));
  }

  public function delete($id){
    $role = Role::find($id);
    $role->delete();
    return back();
  }

  public function update(Request $request){
    $role = Role::find($request->role_id);
    $permissions = $request->permissions;
    is_null($permissions) ? $permissions = [] : $permissions = $permissions;
    $permissions_array = [];
    foreach ($permissions as $key => $value){
      $permissions_array [] = $key;
    }


    $special_permissions = $request->special_permissions;
    is_null($special_permissions) ? $special_permissions = [] : $special_permissions = $special_permissions;
    $special_permissions_array = [];
    foreach ($special_permissions as $key => $value){
      $special_permissions_array [] = $key;
    }

    $role->name = $request->name;
    $role->persian_name = $request->persian_name;
    $role->permissions = json_encode($permissions_array, JSON_UNESCAPED_UNICODE);
    $role->special_permissions = json_encode($special_permissions_array, JSON_UNESCAPED_UNICODE);
    $role->redirect_route = $request->redirect_route;
    $role->type = $request->type;
    $role->save();

    return back()->with('success', 'نقش با موفقیت بروزرسانی شد');
  }


  public function create(){
    $routes = [];
    $routeCollection = Route::getRoutes();
    foreach ($routeCollection as $item) {
      if(strlen($item->getName()) > 1)
        $routes[] =  $item->getName();
    }
    sort($routes);
    $special_permissions = SpecialPermission::all();
    return view('manager.add-roll', compact('routes', 'special_permissions'));
  }



  public function insert(Request $request){
    $permissions = $request->permissions;
    is_null($permissions) ? $permissions = [] : $permissions = $permissions;
    $permissions_array = [];
    foreach ($permissions as $key => $value){
      $permissions_array [] = $key;
    }

    $special_permissions = $request->special_permissions;
    is_null($special_permissions) ? $special_permissions = [] : $special_permissions = $special_permissions;
    $special_permissions_array = [];
    foreach ($special_permissions as $key => $value){
      $special_permissions_array [] = $key;
    }

    $role = Role::create([
      'name' => $request->name,
      'persian_name' => $request->persian_name,
      'permissions' => json_encode($permissions_array, JSON_UNESCAPED_UNICODE),
      'special_permissions' => json_encode($special_permissions_array, JSON_UNESCAPED_UNICODE),
      'redirect_route' => $request->redirect_route,
      'type' => $request->type,
    ]);

    return back()->with('success', 'نقش با موفقیت ثبت شد');
  }
}
