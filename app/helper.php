<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


//=========================== roles ================================

function getRediretRoute(){
  $user = auth()->user();
  $roles = $user->roles;
  foreach ($roles as $role){
    return $role->redirect_route;
  }

  return 'index';
}

function hasRole($role_name, $user = null){
  is_null($user) ? $user = auth()->user() : $user = $user;
  if(is_null($user)) return false;
  foreach ($user->roles as $role) {
    if ($role->name == $role_name) return true;
  }
  return false;
}

function isRolesIn($roles_id, $user = null){
  is_null($user) ? $user = auth()->user() : $user = $user;
  if(is_null($user)) return false;
  $roles = $user->roles;
  foreach ($roles_id as $role_id){
    foreach ($roles as $role){
      if ($role_id == $role->id){
        return true;
      }
    }
  }

  return false;
}


function hasJustRole($role_name, $user = null){
  is_null($user) ? $user = auth()->user() : $user = $user;
  foreach ($user->roles as $role) {
    if ($role->name == $role_name && $user->roles()->count() == 1) return true;
  }
  return false;
}

//function getFirstRole($user = null){
//  is_null($user) ? $user = auth()->user() : $user = $user;
//  foreach ($user->roles as $role) {
//    return $role;
//  }
//}

function hasPublicRole($user = null){
  is_null($user) ? $user = auth()->user() : $user = $user;
  if(is_null($user)) return false;
  foreach ($user->roles as $role) {
    if ($role->type == \App\Models\Role::TYPE_PUBLIC)
    return true;
  }
  return false;
}

function hasPrivateRole($user = null){
  is_null($user) ? $user = auth()->user() : $user = $user;
  if(is_null($user)) return false;
  foreach ($user->roles as $role) {
    if ($role->type == \App\Models\Role::TYPE_PRIVATE)
      return true;
  }
  return false;
}

function rolesAddPermissions($role_names, $new_permissions){
    $role_names = (is_array($role_names)) ? $role_names : [$role_names];
    foreach ($role_names as $name){
        $role = Role::where('name', '=', $name)->first();
        if(is_null($role))
            continue;

        $permissions = $role->permissions;
        try{
            $permissions = json_decode($permissions);
        }catch (Exception $e){
            $permissions = [];
        }
        is_null($permissions) ? $permissions = [] : $permissions = $permissions;
        (!is_array($permissions)) ? $permissions = [] : $permissions = $permissions;

        $permissions = array_merge($permissions, $new_permissions);
        $role->permissions = $permissions;
        $role->save();
    }
}


function roleRemovePermission($role_names, $old_permissions){
    foreach ($role_names as $name){
        $role = Role::where('name', '=', $name)->first();
        if(is_null($role))
            continue;

        $permissions = $role->permissions;
        try{
            $permissions = json_decode($permissions);
        }catch (Exception $e){
            $permissions = [];
        }
        is_null($permissions) ? $permissions = [] : $permissions = $permissions;
        (!is_array($permissions)) ? $permissions = [] : $permissions = $permissions;

        $permissions = array_diff($permissions, $old_permissions);
        $role->permissions = $permissions;
        $role->save();
    }
}

//=========================== permissions ================================
function getPermissions($user = null){
  (is_null($user))? $user = auth()->user() : $user = $user;
  $roles = $user->roles;
  $list = array();
  foreach ($roles as $role){
    $permissions = $role->permissions;
    try{
      $permissions = json_decode($permissions);
      $list = array_merge($list, $permissions);
    }catch (Exception $e){}
  }
  return $list;
}

function getSpecialPermissions($user = null){
  (is_null($user))? $user = auth()->user() : $user = $user;
  $roles = $user->roles;
  $list = array();
  foreach ($roles as $role){
    $permissions = $role->special_permissions;
    try{
      $permissions = json_decode($permissions);
      $list = array_merge($list, $permissions);
    }catch (Exception $e){}
  }
  return $list;
}


function hasAccessRoute($route){
  $permissions = getPermissions();
  if (in_array($route, $permissions))
    return true;
  return false;
}

function hasPermission($route, $user = null){
  (is_null($user))? $user = auth()->user() : $user = $user;
  if (hasRole(Role::ADMIN))
    return true;
  if(is_null($user)) return false;
  $permissions = getPermissions($user);
  if (in_array($route, $permissions))
    return true;
  return false;
}

function hasSpecialPermission($name, $user = null){
  (is_null($user))? $user = auth()->user() : $user = $user;
  if (hasRole(Role::ADMIN))
    return true;
  if(is_null($user)) return false;
  $permissions = getSpecialPermissions($user);
  if (in_array($name, $permissions))
    return true;
  return false;
}

function roleHasPermission($role, $permission){
  $permissions = $role->permissions;
  try{
    $permissions = json_decode($permissions);
  }catch (Exception $e){
    $permissions = [];
  }
  is_null($permissions) ? $permissions = [] : $permissions = $permissions;
  in_array($permission, $permissions) ? $result = true : $result = false;
  return $result;
}

function roleHasSpecialPermission($role, $permission){
  $permissions = $role->special_permissions;
  try{
    $permissions = json_decode($permissions);
  }catch (Exception $e){
    $permissions = [];
  }
  is_null($permissions) ? $permissions = [] : $permissions = $permissions;
  in_array($permission, $permissions) ? $result = true : $result = false;
  return $result;
}



//=========================== files ================================
function canUserUpload($user_id){
    if(hasRole(Role::ADMIN))
        return true;
    $time = \Carbon\Carbon::now()->subHour();
    $uploads_count = \App\Models\UploadLog::where('user_id', '=', $user_id)->where('created_at', '>', $time)->count();
    $uploads_size = \App\Models\UploadLog::where('user_id', '=', $user_id)->where('created_at', '>', $time)->sum('size');
    if ($uploads_count > 50 || $uploads_size > 100)
        return false;
    return true;
}
function uploadFile($file){
    if (!is_file($file)) return null;
    if (is_null($file)) return null;
    $size = ($file->getSize()/1024)/1024; //MB
    if ($size > 50)
        die('حجم فایل بیش از اندازه معین می باشد.');

    $user_id = (is_null(request()->user())) ? 0 :  request()->user()->id;
    $can_upload = canUserUpload($user_id);
    if (!$can_upload)
        die('تعداد و سایز فایلهای آپلود شده در بازه زمانی معین، محدود می باشد.لطفا بعدا امتحان کنید. ');
    $valid_extensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'jpeg', 'jpg', 'png', 'zip', 'rar', 'txt', 'ppt', 'pptx', 'mp4', 'mpeg', 'mpeg'];
    $extension = $file->extension();

    if (!in_array($extension, $valid_extensions) || !in_array($file->getClientOriginalExtension(), $valid_extensions))
        return null;

    date_default_timezone_set('Asia/Tehran');
    $year_dir = date('Y', time());
    $month_dir = date('m', time());
    $random = getRandomString(24) . "_";
    $file_dir = '_uploads_/files/' . $year_dir . '/' . $month_dir;
    $file_dir2 = 'uploads/files/' . $year_dir . '/' . $month_dir;
    $name = $random . $user_id . '_' . $file->getClientOriginalName();
    $file->move($file_dir, $name);
    $path = $file_dir2 .'/'. $name;
//    if (\App\Models\UploadLog::count() > 50000)
//        DB::table('upload_logs')->truncate();
    $log = \App\Models\UploadLog::create([
        'user_id' => $user_id,
        'path' => $path,
        'size' => $size,
    ]);
    return $path;
}

function getRealUploadedFilePath($path){
    return str_replace('uploads/', '_uploads_/', $path);
}




//=========================== random ================================
function getRandomString($length = 6) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function getRandomNumber($length = 6) {
  $characters = '0123456789';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}



//=========================== numbers and strings ================================
function isPasswordSecure($password){
    if (strlen($password) < 8 || !preg_match("#[0-9]+#", $password) || !preg_match("#[a-zA-Z]+#", $password))
        return false;
    return true;
}

function toLatinNumber($string){
  $chars = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
  $latinString = '';

  for ($i = 0 ; $i < strlen($string) ; $i++){
    switch (mb_substr($string, $i, 1, 'utf-8')){
      case  $chars[0] : $latinString .= '0';break;
      case  $chars[1] : $latinString .= '1';break;
      case  $chars[2] : $latinString .= '2';break;
      case  $chars[3] : $latinString .= '3';break;
      case  $chars[4] : $latinString .= '4';break;
      case  $chars[5] : $latinString .= '5';break;
      case  $chars[6] : $latinString .= '6';break;
      case  $chars[7] : $latinString .= '7';break;
      case  $chars[8] : $latinString .= '8';break;
      case  $chars[9] : $latinString .= '9';break;
      default : $latinString .= mb_substr($string, $i, 1, 'utf-8');break;
    }
  }

  return $latinString;
}

function toEnglishNumbers($string){
//  if (request()->hasFile($string)) return $string;
  if (!is_string($string) && !is_array($string)) return $string;
  $string = json_encode($string, JSON_UNESCAPED_UNICODE);
  $persinaDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
  $persinaDigits2 = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨','٩'];
  $allPersianDigits = array_merge($persinaDigits1, $persinaDigits2);
  $replaces = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
  $string = str_replace($allPersianDigits, $replaces , $string);
  return json_decode($string);
}

function toPersianNumber($string){
  $chars = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
  $persianString = '';

  for ($i = 0 ; $i < strlen($string) ; $i++){
    switch (mb_substr($string, $i, 1, 'utf-8')){
      case '0' : $persianString .= $chars[0]; break;
      case '1' : $persianString .= $chars[1]; break;
      case '2' : $persianString .= $chars[2]; break;
      case '3' : $persianString .= $chars[3]; break;
      case '4' : $persianString .= $chars[4]; break;
      case '5' : $persianString .= $chars[5]; break;
      case '6' : $persianString .= $chars[6]; break;
      case '7' : $persianString .= $chars[7]; break;
      case '8' : $persianString .= $chars[8]; break;
      case '9' : $persianString .= $chars[9]; break;
      default : $persianString .= mb_substr($string, $i, 1, 'utf-8');break;
    }
  }

  return $persianString;
}

function toIntNumber($string){
  $int = (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);
  if (strlen($int) > 0) return $int;

  return null;



//  return $int;
//  preg_match_all('!\d+!', $string, $matches);
//  if (count($matches) > 0){
//      return $matches[0][0];
//  }
//  return null;
}

function toNumber($string){
    $int = (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);
    if (strlen($int) > 0)
        return strval($int);
    return null;
}

function toFloatNumber($string){
  $result = preg_replace("/[^0-9.]/", "", $string);
  return (strlen($result) == 0) ? null : $result;
}



//=========================== user ================================
function getFullName($user = '#', $show_national_code = false){
  ($user == '#') ? $user = auth()->user() : $user = $user;
  try {
    $full_name = $user->first_name . ' ' . $user->last_name;
    if ($show_national_code)
      $full_name .= '(' . $user->national_code . ')';
  }catch (Exception $e) {
    $full_name = '';
  }
  return $full_name;
}

function getRolesPersianName($user = null){
  is_null($user) ? $user = auth()->user() : $user = $user;
  $roles = $user->roles;
  $names = '';
  foreach ($roles as $role){
    $names .= $role->persian_name . ',';
  }
  $names = rtrim($names, ',');
  return $names;
}

function findDuplicateUser($mobile = '#', $email = '#', $national_code = '#'){
    return
        User::where('mobile', '=', '0'. $mobile)
        ->orWhere('mobile', '=', ltrim($mobile, '0'))
        ->orWhere('mobile', '=', $mobile)
        ->first();
}






//=========================== views ================================
function getViewList(){
  $views = Storage::disk('views')->allFiles();
  foreach ($views as $key => $value){
    $views[$key] = str_replace('/','.' ,$value);
  }

  return $views;
}


function handleItemActive($check_route){
  $route = \Illuminate\Support\Facades\Request::route()->getName();
  if ($route == $check_route)
    return ' active ';
  return '';
}

function handleItemEnable($check_route, $user = null){
  if (hasRole(\App\Models\Role::ADMIN))
    return '';

  (!is_array($check_route)) ? $check_route = [$check_route] : $check_route = $check_route;
  (is_null($user)) ? $user = auth()->user() : $user = $user;

  foreach ($check_route as $route){
    if (hasPermission($route, $user))
      return '';
  }

  return ' d-none ';
}

function handleItemEnableActive($check_route, $user = null){
    (!is_array($check_route)) ? $check_route = [$check_route] : $check_route = $check_route;
    try {
        $route1 = \Illuminate\Support\Facades\Request::route()->getName();
    }catch (\Throwable $e){
        return ' d-none';
    }
    if ($route1 == $check_route[0])
        $class =  ' active ';
    else
        $class = '';

    (is_null($user)) ? $user = auth()->user() : $user = $user;
    if (hasRole(Role::ADMIN, $user))
        return $class;
    foreach ($check_route as $route){
        if (hasPermission($route, $user))
            return $class;
    }
    $class .= ' d-none ';
    return $class;
}


//=========================== barcode ================================
function generateUserBarcode($user_id){
  try {
    $code = $user_id + 1289789;
    $code *= 2;
    $code = (($user_id % 9) + 1) . $code . ($user_id % 7);
  }catch (Exception $e){
    $code = '';
  }
  return $code;
}


function convertBarcodeToUserId($code){
  try {
    $code = (int)filter_var($code, FILTER_SANITIZE_NUMBER_INT);
    $code = substr($code, 1);
    $code = substr($code, 0, -1);
    $code /= 2;
    $user_id = abs($code - 1289789);
  }catch (Exception $e){
    $user_id = 0;
  }
  return $user_id;
}


//=========================== env ================================
function setEnv($envKey, $envValue) {
  Artisan::call("cache:clear");
  Artisan::call("config:clear");
  Artisan::call("route:clear");

  $envFile = app()->environmentFilePath();
  $str = file_get_contents($envFile);
  $str .= "\n"; // In case the searched variable is in the last line without \n
  $keyPosition = strpos($str, "{$envKey}=");
  $endOfLinePosition = strpos($str, "\n", $keyPosition);
  $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

  // If key does not exist, add it
  if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
    $str .= "{$envKey}={$envValue}\n";
  } else {
    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
  }

  $str = substr($str, 0, -1);
  if (!file_put_contents($envFile, $str))
    return false;
  return true;
}

function getRealPublicPath($path = ''){
    try {
        global $my_public_path;
        return (strlen($path) > 0) ? $my_public_path . $path : $my_public_path;
    }catch (Exception $e){
        return public_path($path);
    }
}

function remove_array_value($arr, $val){
    try {
        if (($key = array_search($val, $arr)) !== false)
            unset($arr[$key]);
    }catch (Exception $e){}
    return $arr;

}

function responseJson($status = 1, $data = null, $message = '', $httpCode = 200){
    if($data === '') $data = null;
    if($data === []) $data = null;
    $version = \App\Models\Setting::getValue(\App\Models\Setting::VERSION);
    return response()->json(['version' => $version, 'status' => $status, 'message' => $message, 'data' => $data], $httpCode )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
}



