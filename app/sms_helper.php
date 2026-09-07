<?php


use App\GhasedakSms;
use App\Helper\SmsIr\SmsIRClient;
use App\Models\Setting;
use GuzzleHttp\Client;
use Kavenegar\KavenegarApi;
use Ipe\Sdk\Facades\SmsIr;



function sendMessage($user, $message){
    try {
        $sms_company = Setting::getValue(Setting::KEY_SMS_COMPANY);
        if ($sms_company == Setting::KEY_SMS_IR){

            try {
                $response = SmsIr::likeToLikeSend(
                    MyCrypt::decrypt(Setting::getValue(Setting::KEY_SMS_IR_LINE_NUMBER)),
                    [$message], [$user->mobile], null);

            }catch (Exception $e){}
        }elseif ($sms_company == Setting::KEY_SMS_FARAZ){
            $sms = new \App\FarazSms(
                MyCrypt::decrypt(Setting::getValue(Setting::KEY_SMS_FARAZ_USERNAME)),
                MyCrypt::decrypt(Setting::getValue(Setting::KEY_SMS_FARAZ_PASSWORD)),
                MyCrypt::decrypt(Setting::getValue(Setting::KEY_SMS_FARAZ_FROM_NUMBER)),
            );
            $mobile = '0' . toNumber($user->mobile);
            $sms->sendSms($message, [$mobile]);
        }elseif ($sms_company == Setting::KEY_SMS_KAVENEGAR){
            $kavenegar_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_KAVENEGAR_API_KEY)->value);
            $kavenegar_sender = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_KAVENEGAR_SENDER)->value);
            $kave = new KavenegarApi($kavenegar_api_key);
            $kave->Send($kavenegar_sender,$user->mobile,$message);
        }elseif ($sms_company == Setting::KEY_SMS_SOROSH){
            $sorosh_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_API_KEY)->value);
            $sorosh_line_number = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_LINE_NUMBER)->value);
            $sorosh_username = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_USERNAME)->value);
            $sorosh_password = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_PASSWORD)->value);
            $sorosh = new \App\SoroshSms($sorosh_api_key, $sorosh_username, $sorosh_password, $sorosh_line_number);
            $sorosh->send($message,['0' . toNumber($user->mobile)]);
        }elseif ($sms_company == Setting::KEY_SMS_GHASEDAK){
            $ghasedak_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_GHASEDAK_API_KEY)->value);
            $ghasedak_line_number = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_GHASEDAK_LINE_NUMBER)->value);
            $ghasedak = new GhasedakSms($ghasedak_api_key);
            $ghasedak->SendSimple('0' . toNumber($user->mobile), $message, $ghasedak_line_number);
        }else{
        }



    }catch (Exception $e){}
}

function sendGroupMessage($messages, $mobiles){
    $i = 0;
    foreach ($mobiles as $mobile){
        $mobiles[$i] = '0' . toNumber($mobiles[$i]);
        $i++;
    }
    try {
        $sms_company = Setting::getValue(Setting::KEY_SMS_COMPANY);
        if ($sms_company == Setting::KEY_SMS_IR){

            try {
                $response = SmsIr::likeToLikeSend(
                    MyCrypt::decrypt(Setting::getValue(Setting::KEY_SMS_IR_LINE_NUMBER)),
                    $messages, $mobiles, null);
            }catch (Exception $e){
            }
        }elseif ($sms_company == Setting::KEY_SMS_FARAZ){
            $sms = new \App\FarazSms(
                MyCrypt::decrypt(Setting::getValue(Setting::KEY_SMS_FARAZ_USERNAME)),
                MyCrypt::decrypt(Setting::getValue(Setting::KEY_SMS_FARAZ_PASSWORD)),
                MyCrypt::decrypt(Setting::getValue(Setting::KEY_SMS_FARAZ_FROM_NUMBER)),
            );
            $res = $sms->sendPoint2Point($messages, $mobiles);
        }elseif ($sms_company == Setting::KEY_SMS_KAVENEGAR){
            $kavenegar_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_KAVENEGAR_API_KEY)->value);
            $kavenegar_sender = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_KAVENEGAR_SENDER)->value);
            $kave = new KavenegarApi($kavenegar_api_key);
            $sender = [];
            foreach ($mobiles as $mobile){
                $sender [] = $kavenegar_sender;
            }
            $kave->SendArray($sender, $mobiles, $messages);
        }elseif ($sms_company == Setting::KEY_SMS_SOROSH){
            $sorosh_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_API_KEY)->value);
            $sorosh_line_number = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_LINE_NUMBER)->value);
            $sorosh_username = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_USERNAME)->value);
            $sorosh_password = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_SOROSH_PASSWORD)->value);
            $sorosh = new \App\SoroshSms($sorosh_api_key, $sorosh_username, $sorosh_password, $sorosh_line_number);
            $sorosh->sendPoint2Point($messages,$mobiles);
        }elseif ($sms_company == Setting::KEY_SMS_GHASEDAK){
            $ghasedak_api_key = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_GHASEDAK_API_KEY)->value);
            $ghasedak_line_number = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_GHASEDAK_LINE_NUMBER)->value);
            $ghasedak = new GhasedakSms($ghasedak_api_key);
            $ghasedak->SendBulk(array_fill(0, count($messages), $ghasedak_line_number), $mobiles, $messages);
        }else{
//      die('تنظیمات پنل sms برای سیستم تنظیم نشده است');
        }

    }catch (Exception $e){
    }
}


//this is from our sms ir
function sendResetPasswordCode($number, $code){
    try{
        $template_code = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_IR_TEMPLATE_NUMBER)->value);
        $result = smsIrFast([["name" => "CODE", "value" => $code]], toNumber($template_code), toNumber($number));
    }catch (Exception $e){}
}

function sendRegisterPasswordCode($number, $code){
    try{
        $template_code = MyCrypt::decrypt(Setting::get(Setting::KEY_SMS_IR_TEMPLATE_NUMBER)->value);
        $result = smsIrFast([["name" => "CODE", "value" => $code]], toNumber($template_code), toNumber($number));
    }catch (Exception $e){}
}












function smsIrFast(array $parameters, $template_id, $number){
    $response = SmsIr::verifySend($number, $template_id, $parameters);
    return $response;
}


