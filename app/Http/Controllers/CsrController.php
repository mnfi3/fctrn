<?php

namespace App\Http\Controllers;

use App\Models\Moadian\Csr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CsrController extends Controller
{

    public function index(){
        $type = 'non_gov';
        $company_name = '';
        $company_english_name = '';
        $national_id = '';
        $mobile = '';
        $email = '';
        $private = '';
        $public = '';
        $csr = '';
        $file = '';
        return view('csr', compact('type', 'company_name', 'company_english_name', 'national_id', 'mobile', 'email', 'private', 'public', 'csr', 'file'));
    }

    public function generate(Request $request){
        $user = $request->user();
        $user_id = (!is_null($user)) ? $user->id : 0;
        $type = $request->type;
        $company_name = $request->company_name;
        $company_english_name = $request->company_english_name;
        $national_id = $request->national_id;
        $mobile = $request->mobile;
        $email = $request->email;
        $request = request();
        $this->validate($request, [
            'captcha' => 'required|captcha'
        ]);

        $config = array();
        $config['config'] = storage_path('openssl.cnf');
        $dn = array(
            "C" => "IR",
            "CN" => $company_english_name,
            "serialNumber" => $national_id,
            "O" => ($type == 'gov') ? "Governmental" : "Non-Governmental",
            "OU" => $company_name,
            "organizationName" => $company_name,
        );

        $privkey = openssl_pkey_new(array(
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
            "config" => $config
        ));

        // Generate a certificate signing request
        $csr = openssl_csr_new($dn, $privkey, array('digest_alg' => 'sha256', 'config'=>$config));
        // Generate a self-signed cert, valid for 3650 days
        $x509 = openssl_csr_sign($csr, null, $privkey, $days=3650, array('digest_alg' => 'sha256'));
        // get private key, CSR and self-signed cert for later use
        $csr = openssl_csr_export($csr, $csr_text);
        $x509 = openssl_x509_export($x509, $x509_text);
        openssl_pkey_export($privkey, $private_text);
        $public_text = openssl_pkey_get_details($privkey)['key'];
        // Show any errors that occurred here
        $errors = '';
        while (($e = openssl_error_string()) !== false) {
            $errors.= $e . "\n";
        }

        $file_name = time().'_'.getRandomString(20).'.txt';
        $file = '/keys/'.$user_id.'_all_'.$file_name;
        $file_private = '/keys/'.$user_id.'_prv_'.$file_name;
        $file_public = '/keys/'.$user_id.'_pub_'.$file_name;
        $file_csr = '/keys/'.$user_id.'_csr_'.$file_name;
        file_put_contents(getRealPublicPath($file), $public_text."\n\n".$private_text."\n\n".$csr_text);
        file_put_contents(getRealPublicPath($file_private), $private_text);
        file_put_contents(getRealPublicPath($file_public), $public_text);
        file_put_contents(getRealPublicPath($file_csr), $csr_text);
        $c = Csr::create([
            'user_id' => $user_id,
            'type' => $type,
            'company_name' => $company_name,
            'company_english_name' => $company_english_name,
            'national_id' => $national_id,
            'mobile' => $mobile,
            'email' => $email,
            'private' => $private_text,
            'public' => $public_text,
            'csr' => $csr_text,
            'x509' => $x509_text,
            'file' => $file,
            'errors' => $errors,
        ]);
        $public = $public_text;
        $private = $private_text;
        $csr = $csr_text;
        return view('csr', compact('type', 'company_name', 'company_english_name',
            'national_id', 'mobile', 'email', 'private', 'public', 'csr', 'file', 'file_private', 'file_public', 'file_csr'));
    }

    public function test() {
        $config = array();
        $config['config'] = storage_path('openssl.cnf');

        $dn = array(
            "C" => "IR",
            "CN" => "sabalanpaydaremohtasham",
            "serialNumber" => "14007810600",
            "O" => "Non-Governmental",
            "OU" => "سبلان پایدار محتشم",
            "organizationName" => "سبلان پایدار محتشم",
        );


//        $dn = array(
//            "countryName" => "IR",
//            "stateOrProvinceName" => "Somerset",
//            "localityName" => "Glastonbury",
//            "organizationName" => "The Brain Room Limited",
//            "organizationalUnitName" => "PHP Documentation Team",
//            "commonName" => "Wez Furlong",
//            "emailAddress" => "wez@example.com"
//        );

// Generate a new private (and public) key pair
        $privkey = openssl_pkey_new(array(
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
            "config" => $config
        ));
//        while (($e = openssl_error_string()) !== false) {
//            echo $e . "\n";
//        }
//        dd($privkey);

// Generate a certificate signing request
        $csr = openssl_csr_new($dn, $privkey, array('digest_alg' => 'sha256', 'config'=>$config));

// Generate a self-signed cert, valid for 365 days
        $x509 = openssl_csr_sign($csr, null, $privkey, $days=3650, array('digest_alg' => 'sha256'));

// Save your private key, CSR and self-signed cert for later use
        $csr = openssl_csr_export($csr, $csrout);
        echo($csrout).'<hr>';
        $x509 = openssl_x509_export($x509, $certout);
        echo($certout).'<hr>';
        openssl_pkey_export($privkey, $pkeyout);
        echo($pkeyout).'<hr>';

        $public = openssl_pkey_get_details($privkey)['key'];
        echo($public).'<hr>';

// Show any errors that occurred here
        while (($e = openssl_error_string()) !== false) {
            echo $e . "\n";
        }
    }
}
