<?php

namespace App\Http\Controllers;

use App\Models\Moadian\Product;
use Illuminate\Http\Request;
use App\Moadian\{Payment,Moadian,Invoice,InvoiceHeader,InvoiceItem};
use DateTime;


class TestController2 extends Controller
{
    public function test() {






        $orgKeyId = '6a2bcd88-a871-4245-a393-2843eafe6e02';




        $username = 'A35NX3';
        $privateKey = '-----BEGIN PRIVATE KEY-----
MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDg+nnS3AFDP3tM
zu922ADyNRf0bdpwIw50UeF1i8hDimkPUbtGti2a6MmcJjekyMyulN3aiHqmH7EP
W15k6h5LuPOux6dsFJmRFsC3W1An5iDQmwSx7fwCtx5qNdK4BZtoka6Y1pt/vdKt
en1vHWAYCykoyO4nmByK5KJhXFDaqbkcX1jqEyG82GmlDSFdsBg8J/ebYFxvmJ0E
06LShaxj06x1x4LP7dccXSgOoy6ks+XrHAOwgwIIUbJrtYaoxXf9azU9jOD1Q5cE
Y0NOsRxSRzkVP1MHW0Lfkta20LEf86bG8xpdq9eX8/tM5tC0KwuRgPP+mD/t99sX
NRzSQKhLAgMBAAECggEAIjORz49olbuR2ARhfRSrWCbgJGWK3p9FtEM6Xi9I25Ow
EwcezEontrQK6jUZInDwRN4WuAElfBm3RhliyT6aKnLMgNaTSif7jIYD+BvmnJos
hOn8FbyTIiqKciUKirU3gfcbrtp5Ozs1SvAjH4A8uor/z9Zz9gr209qcIOby17rK
kjWlzgfc2GA7DxUmKTOfd8VxXbrlSIgU2dVb3nTuF4hXMBu3R0W289ppnKVyfRz0
otKLm3RX5FXXg0iDT7rFOJnnUpKuHBXxNY3c8MUcNH08wlL6Pot6fC8z/EY8/F3G
vMacBZ+TsaoPyAp2RbMTGhGeS3gSgidpFVPS0sD1eQKBgQDz316J/Bmx320SyS62
n/cLa8ZbyIic8FWRZ1toid/uBUX5qzCcC7DrVFybZ9VObDo0BsdQaOn6APNtPZpg
Qad9AxD/lEBfIrf5Y6fCfvfP4xwKUARDGiNE7IoKVOPhDgseuozYpz2SuGEJt1u9
nV2zxakh0wvzOn6NDh2fTImw/QKBgQDsKpL8ufnggYgh3hlUWggSJf/jBSw1F6z5
8GhuzyqSs5fUVmysq5i5Rp46Zm/AWCVev5UOMFhSgFj0i7Zo+PXR/Biwa420I7Bn
S7ShP37/Qa1SZSNOLCCb1BsDBg82N9COJlEdZkW9YISlUYw/nU6RjhrgMocVhybl
BsgWs5YE5wJ/Lbm0ACtEphU+XkdaeuODbqDGkG8JLmPhp2G5weAYHIjgle+DLb8D
bRxkQL83P30LbLXYqTsCo92JxvHGAEZPISFyDnm9mBjqZdhJnC4ySMhMeaKHKg28
jy/KsiU4lPoNG7XessCoytnHWAsJKIRZDVwCWlU36GMPV2NOKpAvQQKBgQCEGHgo
1hlXIvyy/NisHsOe6xRKtgz5EWoWTwsK1+OXNM763PBiUITXNRGx1rQxINyeN4i2
7AGq+9FFz5PS+VX+AwUIQNB87u1viZ/aBXsSaXj5ukpaIkKHBsepFE2T5PpJWFNM
n3TorUDke014E5PrxFFyD7ERMIxn1Dg8wmxqBwKBgQDAmg5DKtzWh2URG4FXKAoY
qYIJbYYKDRgxz5B68oYeB8E590hfY6/5U/Iurcm3HFziypE5M/hG/yW1TeS1Tyxk
cIQUR7Rak72zSSTcyG3VfmBmgOOcd8q0IJ3eNoMrbq3dslfNE/Nt6RGUo4NfNI5t
DDwudUhB2kiG75TT1k7W3g==
-----END PRIVATE KEY-----';




        $moadian = new Moadian($username, $privateKey);
        $info = $moadian->inquiryByReferenceNumbers(['4b3611d1-0142-4cdb-b8ec-05645cd1a21c']);
//        $info = $moadian->getFiscalInfo();
//        $info = $moadian->getEconomicCodeInformation('10840096498');
        dd($info);

        $header = new InvoiceHeader($username);
        $header->setTaxID(new DateTime('2023/12/01'), 2);
        $header->indati2m = strtotime('2023/12/01')*1000;
        $header->indatim = strtotime('2023/12/01')*1000;
        $header->inty = 1; //invoice type
        $header->inno = '0000000002';
        $header->irtaxid = null; // invoice reference tax ID
        $header->inp = 1; //invoice pattern
        $header->ins = 1;//////////////////////////////////////
        $header->tins = 14007810600;
        $header->tob = 2;
        $header->bid = '14003404218';
        $header->tinb = '14003404218';
        $header->bpc = null;

        $amount   = 400000;
        $discount = 0;
        $vat      = 36000;
        $header->tprdis = $amount;
        $header->tdis = $discount;
        $header->tadis = $amount - $discount;
        $header->tvam = $vat;
        $header->todam = 0;
        $header->tbill = $amount - $discount + $vat;
        $header->setm = 1;
        $header->cap = $amount - $discount + $vat;

        $moadianInvoice = new Invoice($header);

//        foreach ($invoice->items as $item) {
            $body = new InvoiceItem();
            $body->sstid = 2720000114542;
            $body->sstt = 'پشتیبانی سامانه ساجد دانشگاه علم و صنعت ایران ۵۰٪ نهایی';
            $body->am = '1';
            $body->mu = 1627;
            $body->fee = 400000;
            $body->prdis = 400000;
            $body->dis = 0;
            $body->adis = 400000;
            $body->vra = 9;
            $body->vam = 36000; // or directly calculate here like floor($body->adis * $body->vra / 100)
            $body->tsstam = 436000;
            $moadianInvoice->addItem($body);
//        }

//        foreach ($invoice->cashes as $cashe) {
//            if ($cashe->active == 1) {
                $payment = new Payment();
                $payment->trn = null;
                $payment->pdt = null;
                $moadianInvoice->addPayment($payment);
//            }
//        }

        $info = $moadian->sendInvoice($moadianInvoice);
        dd($info->getBody());

        $info = Moadian::sendInvoice($moadianInvoice);
        dd($info);
        $info = $info->getBody();
        $info = $info[0];

        $invoice->taxID           = $header->taxid;
        $invoice->uid             = $info['uid'] ?? '';
        $invoice->referenceNumber = $info['referenceNumber'] ?? '';
        $invoice->errorCode       = $info['errorCode'] ?? '';
        $invoice->errorDetail     = $info['errorDetail'] ?? '';
        $invoice->taxResult       = 'send';

        $invoice->save();
    }


    public function importCsv(){
//        $row = 1;
//        if (($handle = fopen("FileStuffCSV1.csv", "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                $num = count($data);
//                if ($row == 1) {
//                    $row++;
//                    continue;
//                }
//                if (!is_numeric($data[2]))
//                    continue;
//                $p = Product::create([
//                    'taxTpStoPartCode' => $data[0],
//                    'type' => $data[4],
//                    'vat' => $data[2],
//                    'descriptionOfId' => $data[1],
//                ]);
//
//                $row++;
//            }
//            fclose($handle);
//        }
//
//
//
//
//
//        $row = 1;
//        if (($handle = fopen("FileStuffCSV2.csv", "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                $num = count($data);
//                if ($row == 1) {
//                    $row++;
//                    continue;
//                }
//                if (!is_numeric($data[2]))
//                    continue;
//                $p = Product::create([
//                    'taxTpStoPartCode' => $data[0],
//                    'type' => $data[4],
//                    'vat' => $data[2],
//                    'descriptionOfId' => $data[1],
//                ]);
//
//                $row++;
//            }
//            fclose($handle);
//        }
//
//
//
//
//
//        $row = 1;
//        if (($handle = fopen("FileStuffCSV3.csv", "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                $num = count($data);
//                if ($row == 1) {
//                    $row++;
//                    continue;
//                }
//                if (!is_numeric($data[2]))
//                    continue;
//                $p = Product::create([
//                    'taxTpStoPartCode' => $data[0],
//                    'type' => $data[4],
//                    'vat' => $data[2],
//                    'descriptionOfId' => $data[1],
//                ]);
//
//                $row++;
//            }
//            fclose($handle);
//        }
//
//
//
//
//
//
//
//        $row = 1;
//        if (($handle = fopen("FileStuffCSV5.csv", "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                $num = count($data);
//                if ($row == 1) {
//                    $row++;
//                    continue;
//                }
//                if (!is_numeric($data[2]))
//                    continue;
//                $p = Product::create([
//                    'taxTpStoPartCode' => $data[0],
//                    'type' => $data[4],
//                    'vat' => $data[2],
//                    'descriptionOfId' => $data[1],
//                ]);
//
//                $row++;
//            }
//            fclose($handle);
//        }
    }



}
