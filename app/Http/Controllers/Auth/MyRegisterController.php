<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Http\Request;

class MyRegisterController extends Controller
{
  public function __construct() {
    $this->middleware('guest');
  }


  public function registerMobile(Request $request){
      $referral_id = $request->referral_id;
    return view('auth.register-send-code', compact('referral_id'));
  }

  public function sendCode(Request $request){
      $request = request();
      $this->validate($request, [
          'captcha' => 'required|captcha'
      ]);


    $mobile = $request->mobile;
    $referral_id = $request->referral_id;
    $user = findDuplicateUser($mobile);
    if ($user != null)
      return back()->with('error', 'این شماره موبایل قبلا در سیستم ثبت شده است.')->with('fail', 'این شماره موبایل قبلا در سیستم ثبت شده است.');

    $vc = VerificationCode::generateCode($mobile);
    $token = $vc->token;
    sendRegisterPasswordCode($mobile, $vc->code);

    $fail = '';

    return view('auth.register-confirm-code', compact('mobile', 'token', 'fail', 'referral_id'));

  }

  public function verifyMobile(Request $request){
    $mobile = $request->mobile;
    $token = $request->mobile_token;
    $code = $request->code;
    $referral_id = $request->referral_id;

    $result = VerificationCode::validateCode($mobile, $code);
    if ($result == false) {
      $fail = 'کد وارد شده اشتباه است';
      return view('auth.register-confirm-code', compact('mobile', 'token', 'fail', 'referral_id'))->with('fail', 'کد وارد شده اشتباه است');
    }
    return redirect(route('register') . '?mobile_token='.$token . '&mobile=' . $mobile . '&referral_id=' . $referral_id);
  }
}
