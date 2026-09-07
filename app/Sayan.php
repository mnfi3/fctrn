<?php

namespace App;


use Illuminate\Support\Facades\Log;
class Sayan {

//WebService Address
    private $token_url = "https://ref.sayancard.ir/ref-payment/RestServices/mts/generateTokenWithNoSign/";
    private $payment_url = "https://say.shaparak.ir/_ipgw_/MainTemplate/payment/";
    private $verify_url = "https://ref.sayancard.ir/ref-payment/RestServices/mts/verifyMerchantTrans/";

    private $username='';
    private $password='';
    private $mid='';


    public function __construct($username, $password, $terminal_id, $mid) {
        $this->username = $username;
        $this->password = $password;
        $this->terminal_id = $terminal_id;
        $this->mid = $mid;
    }

    public function requestToken($amount, $order_id, $redirect_url){
    $data = array(
        'WSContext'=>array('UserId'=>$this->username,'Password'=>$this->password),
        'TransType'=>'EN_GOODS',
        'ReserveNum'=>$order_id,
        'MerchantId'=>$this->mid,
        'TerminalID'=>$this->terminal_id,
        'Amount'=>$amount,
        'RedirectUrl'=>$redirect_url
    );

    $str_data = json_encode($data);
    $result = $this->callApi($this->token_url, $str_data);
    if (!isset($result->Token)) {
        
    Log::warning('Sayan token response malformed', ['response' => $result]);
}
    $response = json_decode($result);
    return $response;
}

    public function redirectToPaymentPage($token){
        echo 'در حال انتقال به درگاه بانکی  ....';
        echo '<br />';
        echo 'چنانچه به بانک متصل نشدید روی دکمه ارسال به درگاه پرداخت کلیک کنید';
        echo "<form name='frmpayment' method='POST' action='" . $this->payment_url . "'>";
        echo "<input type='hidden' name='token' value='" . $token . "'>";
        echo "<input type='hidden' name='language' value='fa'>";
        echo "<input type=\"submit\" class=\"btn\" style=\"background-color:#EE2E24; border:1px solid #EE2E24; border-radius: 4px;color:#FFF;padding:8px 24px; margin-top:7px\" value=\"ارسال به درگاه پرداخت\" />";
        echo "</form>";
        echo "<script type='text/javascript'>setTimeout('document.forms.frmpayment.submit();',3);</script>";
        exit;
    }

    public function verify($token, $ref_num){
    $data = array(
        'WSContext'=>array('UserId'=>$this->username,'Password'=>$this->password),
        'Token'=>$token,
        'RefNum'=>$ref_num
    );

    $str_data = json_encode($data);
    $result = $this->callApi($this->verify_url, $str_data);
    $response = json_decode($result);
    return $response;
}

    private function callApi($url, $data = false){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json',
    'Content-Length: ' . strlen($data)
]);
        $result = curl_exec($curl);
        
         if (curl_errno($curl)) {
        dd('CURL Error: ' . curl_error($curl)); // یا لاگ بگیر
    }
        curl_close($curl);
        return $result;
    }
}
