<?php

namespace App\Http\Controllers;

use App\Models\SpecialPermission;
use Illuminate\Http\Request;

class SpecialPermissionController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('access');
  }


  public function index(){
    $permissions = SpecialPermission::all();
    return view('manager.special-access', compact('permissions'));
  }

  public function insert(Request $request){
    $permission = SpecialPermission::create([
      'name' => $request->name,
      'description' => $request->description,
    ]);

    return back()->with('success', 'اطلاعات با موفقیت ذخیره شد');
  }

  public function update(Request $request){
    $permission = SpecialPermission::find($request->id);
    $permission->name = $request->name;
    $permission->description = $request->description;
    $permission->save();
    return back()->with('success', 'اطلاعات با موفقیت ذخیره شد');
  }
}
