<?php


use App\Moadian\Services\VerhoeffService;
use App\Models\Setting;

function generateInno($taxpayer){
    if ($taxpayer->invoices()->withTrashed()->count() == 0)
        $result = 1;
    else
        $result = intval($taxpayer->invoices()->withTrashed()->max('inno')) + 1;

    $zero_count = 10 - strlen($result);
    for ($i = 1; $i <= $zero_count; $i++)
        $result = '0'. $result;

    return $result;
}



function getPaymentFullInfo($payment){
    $str = "";
    try{
        $data = json_decode($payment->data);
    }catch (Exception $exception){
        $data = json_decode(json_encode([]));
    }
    (is_null($data))? $data = json_decode(json_encode([])) : $data = $data;

    $time = toPersianDateTime($payment->updated_at);
    try {
        switch ($payment->bank_name) {
            case Setting::KEY_BANK_SADAD :
                $str .= ' [' . "زمان : $time" . '] - ';
                $str .= ' [' . "شرح نتیجه تراکنش : $data->description" . '] - ';
                $str .= ' [' . "شماره مرجع تراکنش : $data->retrival_ref_no" . '] - ';
                $str .= ' [' . "شماره پیگیری : $data->system_trace_no" . ']  ';
                return $str;
                break;
            case Setting::KEY_BANK_SAMAN :
                $str .= ' [' . "زمان : $time" . '] - ';
//                $str .= ' [' . "رسید دیجیتالی تراکنش : $data->ref_num" . '] - ';
                $str .= ' [' . "شماره مرجع : $data->rrn" . '] - ';
                $str .= ' [' . "شماره پیگیری : $data->trace_no" . '] - ';
//                $str .= ' [' . "wage : $data->wage" . '] - ';
                $str .= ' [' . "شماره کارت : $data->secure_pan" . '] ';
                return $str;
                break;
            case Setting::KEY_BANK_IRANKISH :
                $str .= ' [' . "زمان : $time" . '] - ';
                $str .= ' [' . "شرح نتیجه تراکنش : $data->description" . '] - ';
                $str .= ' [' . "شماره ارجاع : $data->retrievalReferenceNumber" . '] - ';
                $str .= ' [' . "شماره سند/پیگیری : $data->systemTraceAuditNumber" . ']  ';
                return $str;
                break;
            case Setting::KEY_BANK_PARSIAN :
                $str .= ' [' . "زمان : $time" . '] - ';
                $str .= ' [' . "شرح نتیجه تراکنش : $data->description" . '] - ';
                $str .= ' [' . "شماره مرجع تراکنش : $data->retrival_ref_no" . '] - ';
                $str .= ' [' . "شماره کارت : $data->card_number" . ']  ';
                return $str;
                break;
            default:
                return '';
        }
    }catch (Exception $e){
        return '';
    }
}




function getDaysPastEpoch(DateTime $date): int
{
    return (int)($date->getTimestamp() / (3600 * 24));
}

function clientIdToNumber(string $clientId): string
{
    define('CHARACTER_TO_NUMBER_CODING', [
        'A' => 65, 'B' => 66, 'C' => 67, 'D' => 68, 'E' => 69, 'F' => 70, 'G' => 71, 'H' => 72, 'I' => 73,
        'J' => 74, 'K' => 75, 'L' => 76, 'M' => 77, 'N' => 78, 'O' => 79, 'P' => 80, 'Q' => 81, 'R' => 82,
        'S' => 83, 'T' => 84, 'U' => 85, 'V' => 86, 'W' => 87, 'X' => 88, 'Y' => 89, 'Z' => 90,
    ]);

    $result = '';
    foreach (str_split($clientId) as $char) {
        if (is_numeric($char)) {
            $result .= $char;
        } else {
            $result .= CHARACTER_TO_NUMBER_CODING[$char];
        }
    }

    return $result;
}




 function generateTaxId(DateTime $date, int $internalInvoiceId, $username){
    $daysPastEpoch = getDaysPastEpoch($date);
    $daysPastEpochPadded = str_pad($daysPastEpoch, 6, '0', STR_PAD_LEFT);
    $hexDaysPastEpochPadded = str_pad(dechex($daysPastEpoch), 5, '0', STR_PAD_LEFT);

    $numericClientId = clientIdToNumber($username);

    $internalInvoiceIdPadded = str_pad($internalInvoiceId, 12, '0', STR_PAD_LEFT);
    $hexInternalInvoiceIdPadded = str_pad(dechex($internalInvoiceId), 10, '0', STR_PAD_LEFT);

    $decimalInvoiceId = $numericClientId . $daysPastEpochPadded . $internalInvoiceIdPadded;

    $checksum = VerhoeffService::checkSum($decimalInvoiceId);

    return strtoupper($username . $hexDaysPastEpochPadded . $hexInternalInvoiceIdPadded . $checksum);
}


function getLastMonthsInvoiceData($count = 6) {
    $user = auth()->user();
    $now = date('Y-m-d');
    $count -= 1;
    $past_month = date('Y-m-d', strtotime("-$count months"));
    $persian_date = toPersianDate($past_month);

    $persian_start_date = substr($persian_date, 0, 8).'01';
    $date_array = explode('/', $persian_start_date);
    if (intval($date_array[1]) == 12){
        $date_array[0] = intval($date_array[0])+1;
        $date_array[1] = '01';
        $persian_finish_date = implode('/', $date_array);
    }else{
        if (intval($date_array[1]) >= 9)
            $date_array[1] = intval($date_array[1]) + 1;
        else
            $date_array[1] = '0' . (intval($date_array[1]) + 1);
        $persian_finish_date = implode('/', $date_array);
    }
    $month_names = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
    $sum_invoice = [];
    $sum_tax = [];
    $names = [];
    for($i = 0 ; $i <= $count ; $i++){
        $sum_invoice [] = $user->invoices()
            ->where('indatim', '>=', strtotime(toGeorgianDate($persian_start_date))*1000)
            ->where('indatim', '<', strtotime(toGeorgianDate($persian_finish_date))*1000)->sum('tbill');

        $sum_tax [] = $user->invoices()
            ->where('indatim', '>=', strtotime(toGeorgianDate($persian_start_date))*1000)
            ->where('indatim', '<', strtotime(toGeorgianDate($persian_finish_date))*1000)->sum('tvam');

        $names [] = ($month_names[intval(explode('/', $persian_start_date)[1]) - 1]);
        $persian_start_date = $persian_finish_date;
        $date_array = explode('/', $persian_start_date);
        if (intval($date_array[1]) == 12){
            $date_array[0] = intval($date_array[0])+1;
            $date_array[1] = '01';
            $persian_finish_date = implode('/', $date_array);
        }else{
            if (intval($date_array[1]) >= 9)
                $date_array[1] = intval($date_array[1]) + 1;
            else
                $date_array[1] = '0' . (intval($date_array[1]) + 1);
            $persian_finish_date = implode('/', $date_array);
        }
    }

    return ['sum_invoice' => $sum_invoice, 'sum_tax' => $sum_tax, 'names' => $names];
}

function hasInvoiceVerifyError($response){
    if (strlen($response) < 3)
        return false;
    try {
        $response = json_decode($response);
        $response = $response[0];
        if ($response->status == 'SUCCESS') return false;
        else return true;
    }catch (Exception $e){
        return false;
    }
}

function getInvoiceVerifyErrors($response){
    if (strlen($response) < 3)
        return array('خطایی وجود ندارد');
    try {
        $response = json_decode($response);
        $response = $response[0];
        if ($response->status == 'SUCCESS') return array('خطایی وجود ندارد');
        $errors = $response->data->error;
        $result = [];
        foreach ($errors as $error){
            $result[] = '#'.$error->code.'# '.$error->message;
        }
        return $result;
    }catch (Exception $e){
        return array('مشکل در باز کردن بسته');
    }
}
