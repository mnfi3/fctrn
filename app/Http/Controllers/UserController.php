<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\InfinitePackage;
use App\Models\Moadian\Invoice;
use App\Models\Moadian\UserInfinitePackage;
use App\Models\Moadian\UserProduct;
use App\Models\Moadian\UserPublicPackage;
use App\Models\Payment;
use App\Models\PublicPackage;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('access');
  }

  public function index(){
    $users = User::orderBy('id', 'desc')->get();
    return view('manager.users', compact('users'));
  }

  public function create(){
    $roles = Role::all();
    return view('manager.add-user', compact('roles'));
  }

  public function insert(Request $request){

    $users = User::where('mobile', '=', $request->mobile)->get();
    if (count($users) > 0)
      return back()->with('fail', 'این شماره تلفن قبلا در سیستم ثبت شده است');
    $users = User::where('email', '=', $request->email)->get();
    if (count($users) > 0)
      return back()->with('fail', 'این ایمیل قبلا در سیستم ثبت شده است');


    $user = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'national_code' => $request->national_code,
      'mobile' => $request->mobile,
      'email' => $request->email,
      'referral_id' => $request->referral_id,
      'password' => Hash::make($request->national_code),
      'address' => $request->address,
      'is_admin_register' => 1,
      'register_cost' => Setting::getValue(Setting::KEY_REGISTER_COST),
      'is_payed_register_cost' => 0,
    ]);



    UserRole::create([
      'user_id' => $user->id,
      'role_id' => $request->role_id,
    ]);


    return back()->with('success', 'کاربر با موفقیت ایجاد شد');
  }


  public function edit(){
      $user = \auth()->user();
      return view('user.info.index', compact('user'));
  }
  public function update(Request $request){
    $user = Auth::user();
    $success = '';
    $fail = '';

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->national_code = $request->national_code;
    $user->email = $request->email;
    $user->save();
    $success .= ' اطلاعات با موفقیت بروزرسانی شد. ';

      return back()->with('success', $success)->with('fail', $fail);
  }

  public function referralIndex(){
      $user = Auth::user();
      $barcode = generateUserBarcode($user->id);
      $users = User::where('referral_id', '=', $barcode)->get();
      return view('user.referral.index', compact('users'));
  }

  public function updatePassword(Request $request){
      $user = Auth::user();
//      if (!isPasswordSecure($request->new_password))
      if (strlen($request->new_password) < 8)
          return back()->with('fail', ' رمز عبور حداقل باید دارای 8 کاراکتر بوده و شامل اعداد و حروف انگلیسی باشد.');
      if (!Hash::check($request->current_password, $user->password))
          return back()->with('fail', 'رمز فعلی وارد شده اشتباه است.');
      if ($request->new_password != $request->confirm_password)
          return back()->with('fail', 'رمز عبور جدید وارد شده با همدیگر مطابقت ندارند ');


      $user->password = Hash::make($request->new_password);
      $user->save();
      return back()->with('success', 'رمز شما با موفقیت تغییر یافت.');

  }

  public function updateOther(Request $request){
    $user = User::find($request->user_id);
    $success = '';
    $fail = '';

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->national_code = $request->national_code;
    $user->save();


    $success .= ' اطلاعات با موفقیت بروزرسانی شد. ';

    if($user->mobile != $request->mobile){
      $user2 = findDuplicateUser($user->mobile);
      if (is_null($user2)){
        $user->mobile = $request->mobile;
        $user->save();
        $success .=  ' شماره موبایل با موفقیت تغییر یافت. ';
      }else{
        $fail .= ' شماره موبایل وارد شده قبلا در سیستم ثبت شده است. ';
      }
    }

//    if($user->email != $request->email){
//      $users = User::where('email', '=', $request->email)->get();
//      if (count($users)  == 0){
        $user->email = $request->email;
        $user->save();
        $success .=  ' ایمیل با موفقیت تغییر یافت. ';
//      }else{
//        $fail .= ' ایمیل وارد شده قبلا در سیستم ثبت شده است. ';
//      }
//    }



    if (strlen($request->password) > 0 && strlen($request->password) < 6){
      $fail .= ' رمز عبور حداقل باید 6 کاراکتر باشد. ';
    }elseif (strlen($request->password) >= 6){
      $user->password = Hash::make($request->password);
      $user->save();
      $success .= ' رمز شما با موفقیت تغییر یافت. ';
    }

    return back()->with('success', $success)->with('fail', $fail);

  }


  public function resetPasswordOther(Request $request){
    $user = User::find($request->user_id);
    $user->password = Hash::make($user->national_code);
    $user->password_changed_at = Carbon::now();
    $user->save();
    return back()->with('success', 'رمز عبور با موفقیت به کد ملی کاربر تغییر یافت');

  }


  public function loginWithId($id){
      Auth::loginUsingId($id);
      return redirect(route('home'));
  }

  public function detail($id){
      $user = User::find($id);
      $invoices = $user->invoices()->orderBy('id', 'desc')->paginate(10, ['*'], 'invoices');
      $sum_sell = $user->invoices()->where('status', '=', Invoice::STATUS_VERIFY_SUCCESS)->sum('tbill');
      $sum_tax = $user->invoices()->where('status', '=', Invoice::STATUS_VERIFY_SUCCESS)->sum('tvam');
      $factor_count = $user->invoices()->orderBy('id', 'desc')->count();
      $invoice_remain_count = $user->publicPackages()->sum('remain_count');
      $taxpayer_count = $user->taxpayers()->count();
      $customer_count = $user->customers()->count();
      $referral_counts = User::where('referral_id', '=', generateUserBarcode($user->id))->count();
      $infinite_package_count = $user->infinitePackages()->where('to_date', '>=', date('Y-m-d'))->count();
      $payments = $user->payments()->orderBy('id', 'desc')->paginate(10, ['*'], 'payments');
      $taxpayers = $user->taxpayers()->orderBy('id', 'desc')->paginate(10, ['*'], 'taxpayers');
      $customers = $user->customers()->orderBy('id', 'desc')->paginate(10, ['*'], 'customers');
      $user_products = UserProduct::orderBy('id','desc')->where('user_id', '=', $user->id)->first();
      $public_packages = PublicPackage::all();
      $infinite_packages = InfinitePackage::all();
      return view('manager.userDetails', compact('user', 'invoices', 'sum_sell', 'sum_tax', 'factor_count', 'invoice_remain_count',
      'taxpayer_count', 'customer_count', 'referral_counts', 'infinite_package_count',
      'payments', 'taxpayers', 'customers', 'user_products', 'public_packages', 'infinite_packages'));
  }

  public function registerInfinite(Request $request){
      $user_id = $request->user_id;
      $taxpayer_id = $request->taxpayer_id;
      $cost = $request->cost;
      $package_id = $request->package_id;
      $day_count = $request->day_count;
      $user_pack = UserInfinitePackage::create([
          'user_id' => $user_id,
          'taxpayer_id' => $taxpayer_id,
          'cost' => $cost,
          'from_date' => date("Y-m-d H:i:s"),
          'to_date' =>  date("Y-m-d H:i:s", strtotime("+$day_count days")),
      ]);

      $payment = Payment::create([
          'user_id' => $user_id,
          'paymentable_id' => $package_id,
          'paymentable_type' => InfinitePackage::class,
          'bank_name' => 'admin',
          'amount' => $cost,
          'receipt' => 'ثبت شده توسط مدیر',
          'data' => null,
          'is_success' => 1,
      ]);
      return back()->with('success', 'بسته نامحدود با موفقیت برای کاربر فعال شد');
  }

  public function registerPublic(Request $request){
      $user_id = $request->user_id;
      $cost = $request->cost;
      $package_id = $request->package_id;
      $user_pack = UserPublicPackage::create([
          'user_id' => $user_id,
          'cost' => $cost,
          'all_count' => $request->count,
          'remain_count' => $request->count,
      ]);

      $payment = Payment::create([
          'user_id' => $user_id,
          'paymentable_id' => $package_id,
          'paymentable_type' => PublicPackage::class,
          'bank_name' => 'admin',
          'amount' => $cost,
          'receipt' => 'ثبت شده توسط مدیر',
          'data' => null,
          'is_success' => 1,
      ]);
      return back()->with('success', 'بسته تعدادی با موفقیت برای کاربر فعال شد');
  }











}
