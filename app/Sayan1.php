<?php

namespace App;

class Sayan {

//WebService Address
    private $token_url = "https://ref.sayancard.ir/ref-payment/RestServices/mts/generateTokenWithNoSign/";
    private $payment_url = "https://say.shaparak.ir/_ipgw_/MainTemplate/payment/";
    private $verify_url = "https://ref.sayancard.ir/ref-payment/RestServices/mts/verifyMerchantTrans/";

    private $username='';
    private $password='';
    private $merchant='';
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
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode( $data ),
                'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
            )
        );
//        ini_set('allow_url_fopen', 1);
//        ini_set('php_admin_flag[allow_url_fopen]', 'on');
//        if( ini_get('allow_url_fopen') ) {
//            die('allow_url_fopen is enabled. file_get_contents should work well');
//        } else {
//            die('allow_url_fopen is disabled. file_get_contents would not work');
//        }
//        $str_data = json_encode($data);
//        $result = $this->callApi($this->token_url, $str_data);
        $context  = stream_context_create( $options );
        $result = file_get_contents( $this->token_url, false, $context );
        dd($result);
        $response = json_decode( $result );
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
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode( $data ),
                'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
            )
        );
//        ini_set('allow_url_fopen', 1);
//        ini_set('php_admin_flag[allow_url_fopen]', 'on');
//        $str_data = json_encode($data);
//        $result = $this->callApi($this->verify_url, $str_data);
        $context  = stream_context_create( $options );
        $result = file_get_contents( $this->verify_url, false, $context );
        $response = json_decode( $result );
        return $response;
    }

    private function callApi($url, $data = false){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json\r\n', 'Content-Length: ' . strlen($data)));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}
