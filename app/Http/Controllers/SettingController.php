<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use \MyCrypt;

class SettingController extends Controller
{

    public function smsSetting(){
        $sms_company = Setting::get(Setting::KEY_SMS_COMPANY)->value;
        $sms_ir_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_IR_API_KEY)->value);
        $sms_ir_secret_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_IR_SECRET_KEY)->value);
        $sms_ir_line_number = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_IR_LINE_NUMBER)->value);
        $sms_ir_template_number = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_IR_TEMPLATE_NUMBER)->value);
        $sms_faraz_username = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_FARAZ_USERNAME)->value);
        $sms_faraz_password = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_FARAZ_PASSWORD)->value);
        $sms_faraz_from_number = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_FARAZ_FROM_NUMBER)->value);
        $sms_faraz_pattern_code = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_FARAZ_PATTERN_CODE)->value);
        $sms_kavenegar_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_KAVENEGAR_API_KEY)->value);
        $sms_kavenegar_sender = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_KAVENEGAR_SENDER)->value);
        $sms_sorosh_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_API_KEY)->value);
        $sms_sorosh_line_number = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_LINE_NUMBER)->value);
        $sms_sorosh_username = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_USERNAME)->value);
        $sms_sorosh_password = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_PASSWORD)->value);

        return view('manager.sms-info', compact('sms_company', 'sms_ir_api_key', 'sms_ir_secret_key', 'sms_ir_line_number', 'sms_ir_template_number', 'sms_faraz_username',
            'sms_faraz_password', 'sms_faraz_from_number', 'sms_faraz_pattern_code', 'sms_kavenegar_api_key', 'sms_kavenegar_sender',
            'sms_sorosh_api_key', 'sms_sorosh_line_number', 'sms_sorosh_username', 'sms_sorosh_password'));
    }

    public function smsSettingUpdate(Request $request){
        $sms_company = Setting::get(Setting::KEY_SMS_COMPANY);$sms_company->value = $request->sms_company;$sms_company->save();
        $sms_ir_api_key = Setting::get(Setting::KEY_SMS_IR_API_KEY);$sms_ir_api_key->value = MyCrypt::encrypt($request->sms_ir_api_key); $sms_ir_api_key->save();
        $sms_ir_secret_key = Setting::get(Setting::KEY_SMS_IR_SECRET_KEY);$sms_ir_secret_key->value = MyCrypt::encrypt($request->sms_ir_secret_key); $sms_ir_secret_key->save();
        $sms_ir_line_number = Setting::get(Setting::KEY_SMS_IR_LINE_NUMBER);$sms_ir_line_number->value = MyCrypt::encrypt($request->sms_ir_line_number); $sms_ir_line_number->save();
        $sms_ir_template_number = Setting::get(Setting::KEY_SMS_IR_TEMPLATE_NUMBER);$sms_ir_template_number->value = MyCrypt::encrypt($request->sms_ir_template_number); $sms_ir_template_number->save();
        $sms_faraz_username = Setting::get(Setting::KEY_SMS_FARAZ_USERNAME);$sms_faraz_username->value = MyCrypt::encrypt($request->sms_faraz_username); $sms_faraz_username->save();
        $sms_faraz_password = Setting::get(Setting::KEY_SMS_FARAZ_PASSWORD);$sms_faraz_password->value = MyCrypt::encrypt($request->sms_faraz_password); $sms_faraz_password->save();
        $sms_faraz_from_number = Setting::get(Setting::KEY_SMS_FARAZ_FROM_NUMBER);$sms_faraz_from_number->value = MyCrypt::encrypt($request->sms_faraz_from_number); $sms_faraz_from_number->save();
        $sms_faraz_pattern_code = Setting::get(Setting::KEY_SMS_FARAZ_PATTERN_CODE);$sms_faraz_pattern_code->value = MyCrypt::encrypt($request->sms_faraz_pattern_code); $sms_faraz_pattern_code->save();
        $sms_kavenegar_api_key = Setting::get(Setting::KEY_SMS_KAVENEGAR_API_KEY);$sms_kavenegar_api_key->value = MyCrypt::encrypt($request->sms_kavenegar_api_key); $sms_kavenegar_api_key->save();
        $sms_kavenegar_sender = Setting::get(Setting::KEY_SMS_KAVENEGAR_SENDER);$sms_kavenegar_sender->value = MyCrypt::encrypt($request->sms_kavenegar_sender); $sms_kavenegar_sender->save();
        $sms_sorosh_api_key = Setting::get(Setting::KEY_SMS_SOROSH_API_KEY);$sms_sorosh_api_key->value = MyCrypt::encrypt($request->sms_sorosh_api_key); $sms_sorosh_api_key->save();
        $sms_sorosh_line_number = Setting::get(Setting::KEY_SMS_SOROSH_LINE_NUMBER);$sms_sorosh_line_number->value = MyCrypt::encrypt($request->sms_sorosh_line_number); $sms_sorosh_line_number->save();
        $sms_sorosh_user_name = Setting::get(Setting::KEY_SMS_SOROSH_USERNAME);$sms_sorosh_user_name->value = MyCrypt::encrypt($request->sms_sorosh_username); $sms_sorosh_user_name->save();
        $sms_sorosh_password = Setting::get(Setting::KEY_SMS_SOROSH_PASSWORD);$sms_sorosh_password->value = MyCrypt::encrypt($request->sms_sorosh_password); $sms_sorosh_password->save();
        return back()->with('success', 'اطلاعات با موفقیت بروزرسانی شد');
    }
}
