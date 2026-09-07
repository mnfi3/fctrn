<?php

namespace App\Http\Controllers\Moadian;

use App\Http\Controllers\Controller;
use App\Moadian\Moadian;
use App\Models\Moadian\Customer;
use App\Models\Moadian\Invoice;
use App\Models\Moadian\InvoiceItem;
use App\Models\Moadian\Product;
use App\Models\Moadian\Taxpayer;
use App\Models\Moadian\Unit;
use App\Models\Moadian\UserInfinitePackage;
use App\Models\Moadian\UserProduct;
use App\Models\Moadian\UserPublicPackage;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use DateTime;

class InvoiceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function index(Request $request){
        $user = auth()->user();
        $taxpayers = $user->taxpayers;
        $customers = $user->customers;

        $taxpayer_ids = (is_array($request->taxpayer_ids)) ? remove_array_value($request->taxpayer_ids, 0): [];
        $customer_ids = (is_array($request->customer_ids)) ? remove_array_value($request->customer_ids, 0): [];
        $number = $request->number;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $from_amount = $request->from_amount;
        $to_amount = $request->to_amount;
        $taxid = $request->taxid;
        $refrence_number = $request->refrence_number;
        $ins = (is_array($request->ins)) ? remove_array_value($request->ins, 0): [];
        $statuses = (is_array($request->statuses)) ? remove_array_value($request->statuses, 0): [];
        $invoices = $user->invoices()->orderBy('id', 'desc');

        $invoices = (count($taxpayer_ids) == 0) ? $invoices : $invoices->whereIn('taxpayer_id', $taxpayer_ids);
        $invoices = (count($customer_ids) == 0) ? $invoices : $invoices->whereIn('customer_id', $customer_ids);
        $invoices = (strlen($number) < 1) ? $invoices : $invoices->where('number', 'like', "%$number%");
        $invoices = (strlen($from_date) < 1) ? $invoices : $invoices->where('indatim', '>=', strtotime(toGeorgianDate($from_date))*1000);
        $invoices = (strlen($to_date) < 1) ? $invoices : $invoices->where('indatim', '<=', strtotime(toGeorgianDate($to_date))*1000);
        $invoices = (strlen($from_amount) == 0) ? $invoices : $invoices->where('tbill', '>=', toFloatNumber($from_amount));
        $invoices = (strlen($to_amount) == 0) ? $invoices : $invoices->where('tbill', '<=', toFloatNumber($to_amount));
        $invoices = (strlen($taxid) == 0) ? $invoices : $invoices->where('taxid', 'like', "%$taxid%");
        $invoices = (strlen($refrence_number) == 0) ? $invoices : $invoices->where('refrence_number', 'like', "%$refrence_number%");
        $invoices = (count($ins) == 0) ? $invoices : $invoices->whereIn('ins', $ins);
        $invoices = (count($statuses) == 0) ? $invoices : $invoices->whereIn('status', $statuses);
//        dd($invoices->get());

        $invoices = $invoices->paginate(10000);
        return view('user.factors.index', compact('taxpayers', 'customers', 'invoices',
        'taxpayer_ids', 'customer_ids', 'number', 'from_date', 'to_date', 'from_amount', 'to_amount', 'taxid', 'refrence_number', 'ins', 'statuses'));
    }

//    public function indexDraft(Request $request){
//
//    }

    public function create(){
        $user = auth()->user();
        $taxpayers = $user->taxpayers;
        $customers = $user->customers;
        $units = Unit::all();
//        $products = Product::all();
        $products = UserProduct::getUserProducts();
        return view('user.factors.create', compact('taxpayers', 'customers', 'units', 'products'));
    }

    public function createGold(){
        $user = auth()->user();
        $taxpayers = $user->taxpayers;
        $customers = $user->customers;
        $units = Unit::all();
//        $products = Product::all();
        $products = UserProduct::getUserProducts();
        return view('user.factors.createGold', compact('taxpayers', 'customers', 'units', 'products'));
    }

    public function insert(Request $request){
        $user = auth()->user();
        $taxpayer = Taxpayer::find($request->taxpayer_id);
        $customer = ($request->inty == 1) ? Customer::find($request->customer_id) : null;
        $is_send = (is_null($request->is_send)) ? 0 : 1;
        if ($taxpayer->user_id != $user->id)
            return back()->with('fail', 'شما به این آیتم دسترسی ندارید');
        if (!is_null($customer))
            if ($customer->user_id != $user->id)
                return back()->with('fail', 'شما به این آیتم دسترسی ندارید');

        //check user credit
        $can_insert = false;
        $i_package = UserInfinitePackage::where('user_id', '=', $user->id)
            ->where('taxpayer_id', '=', $taxpayer->id)
            ->where('to_date', '>=', date('Y-m-d'))->first();
        if (!is_null($i_package)) $can_insert = true;
        if (!$can_insert){
            $p_package = UserPublicPackage::where('user_id', '=', $user->id)->where('remain_count', '>', 0)->first();
            if (!is_null($p_package)){
                $p_package->remain_count = $p_package->remain_count - 1;
                $p_package->save();
                $can_insert = true;
            }
        }
        if (!$can_insert)
            return back()->with('fail', 'شما هیچ بسته فعالی برای این مودی ندارید.لطفا اقدام به خرید بسته نمایید.');

        $invoice = Invoice::create([
            'user_id' => $user->id,
            'taxpayer_id' => $taxpayer->id,
            'customer_id' => ($request->inty == 1) ? $customer->id : null,
            'status' => Invoice::STATUS_DRAFT,
            'username' => $taxpayer->username,
            'private_key' => $taxpayer->private_key,
            'send_response' => null,
            'verify_response' => null,
            'sent_at' => null,
            'verified_at' => null,
            'number' => $request->number,
            'uid' => null,
            'taxid' => generateTaxId(
                new DateTime(toGeorgianDate($request->indatim)),
                intval(generateInno($taxpayer)),
                $taxpayer->username
            ),

            'indatim' => (strtotime(toGeorgianDate($request->indatim))*1000)."",
            'indati2m' => (strtotime(toGeorgianDate($request->indatim))*1000)."",
            'inty' => $request->inty,
            'inno' => generateInno($taxpayer),
            'irtaxid' => ($request->ins > 1) ? $request->irtaxid : null,
            'inp' => $request->inp,
            'ins' => $request->ins,
            'tins' => $taxpayer->economic_code,
//            'tins' => $taxpayer->national_id,
            'tob' => ($request->inty == 1) ? $customer->type : null,
            'bid' => ($request->inty == 1) ? $customer->national_code : null,
//            'tinb' => ($request->inty == 1) ? $customer->national_code : null,
            'tinb' => ($request->inty == 1) ? $customer->economic_code : null,
            'sbc' => $request->sbc,
            'bpc' => ($request->inty == 1) ? $customer->postal_code : null,
            'bbc' => $request->bbc,
            'ft' => null,
            'bpn' => $request->bpn,
            'scln' => $request->scln,
            'scc' => $request->scc,
            'cdcn' => $request->cdcn,
            'cdcd' => (strlen($request->cdcd) > 0) ? intval(strtotime(toGeorgianDate($request->cdcd))/86400) : null,
            'crn' => $request->crn,
            'billid' => $request->billid,
            'tprdis' => toFloatNumber($request->tprdis),
            'tdis' => toFloatNumber($request->tdis),
            'tadis' => toFloatNumber($request->tadis),
            'tvam' => toFloatNumber($request->tvam),
            'todam' => toFloatNumber($request->todam),
            'tbill' => toFloatNumber($request->tbill),
            'tonw' => toFloatNumber($request->tonw),
            'torv' => toFloatNumber($request->torv),
            'tocv' => toFloatNumber($request->tocv),
            'setm' => $request->setm,
            'cap' => toFloatNumber($request->cap),
            'insp' => toFloatNumber($request->insp),
            'tvop' => null, //*****
            'tax17' => toFloatNumber($request->tax17),
        ]);

        //gold
        if ($invoice->inp == 3){
            $D0 = array_combine(range(1, count($request->D0)), array_values($request->D0));
            $D01 = array_combine(range(1, count($request->D01)), array_values($request->D01));
            $D1 = array_combine(range(1, count($request->D1)), array_values($request->D1));
            $D2 = array_combine(range(1, count($request->D2)), array_values($request->D2));
            $D3 = array_combine(range(1, count($request->D3)), array_values($request->D3));
            $D4 = array_combine(range(1, count($request->D4)), array_values($request->D4));
            $D5 = array_combine(range(1, count($request->D5)), array_values($request->D5));
            $D6 = array_combine(range(1, count($request->D6)), array_values($request->D6));
            $D7 = array_combine(range(1, count($request->D7)), array_values($request->D7));
            $D8 = array_combine(range(1, count($request->D8)), array_values($request->D8));
            $D9 = array_combine(range(1, count($request->D9)), array_values($request->D9));
            $D10 = array_combine(range(1, count($request->D10)), array_values($request->D10));
            $D11 = array_combine(range(1, count($request->D11)), array_values($request->D11));
            $D13 = array_combine(range(1, count($request->D13)), array_values($request->D13));
            $D14 = array_combine(range(1, count($request->D14)), array_values($request->D14));
            $index = (is_array($D0)) ? array_key_first($D0) : 1;
            foreach ($D0 as $ii) {
                $item = InvoiceItem::create([
                    'user_id' => $user->id,
                    'taxpayer_id' => $taxpayer->id,
                    'invoice_id' => $invoice->id,
                    'sstid' => $D0[$index],
                    'sstt' => $D01[$index],
                    'am' => toFloatNumber($D2[$index]),
                    'mu' => $D1[$index],
                    'nw' => null,
                    'fee' => toFloatNumber($D3[$index]),
                    'cfee' => null,
                    'cut' => null,
                    'exr' => null,
                    'ssrv' => null,
                    'sscv' => null,
                    'prdis' => toFloatNumber($D4[$index]),
                    'dis' => toFloatNumber($D5[$index]),
                    'adis' => toFloatNumber($D6[$index]),
                    'vra' => $D7[$index],
//                    'vra' => 9,
                    'vam' => toFloatNumber($D8[$index]),
                    'odt' => null,
                    'odr' => null,
                    'odam' => null,
                    'olt' => null,
                    'olr' => null,
                    'olam' => null,
                    'consfee' => toFloatNumber($D9[$index]),
                    'spro' => toFloatNumber($D10[$index]),
                    'bros' => toFloatNumber($D13[$index]),
                    'tcpbs' => toFloatNumber($D9[$index]) + toFloatNumber($D10[$index]) + toFloatNumber($D13[$index]),
                    'cui' => toFloatNumber($D14[$index]),
                    'cop' => null,
                    'vop' => null,
                    'bsrn' => null,
                    'tsstam' => toFloatNumber($D11[$index]),
                ]);

                $index++;
            }
        }else {
            $D0 = array_combine(range(1, count($request->D0)), array_values($request->D0));
            $D01 = array_combine(range(1, count($request->D01)), array_values($request->D01));
            $D1 = array_combine(range(1, count($request->D1)), array_values($request->D1));
            $D2 = array_combine(range(1, count($request->D2)), array_values($request->D2));
            $D3 = array_combine(range(1, count($request->D3)), array_values($request->D3));
            $D4 = array_combine(range(1, count($request->D4)), array_values($request->D4));
            $D5 = array_combine(range(1, count($request->D5)), array_values($request->D5));
            $D6 = array_combine(range(1, count($request->D6)), array_values($request->D6));
            $D7 = array_combine(range(1, count($request->D7)), array_values($request->D7));
            $D8 = array_combine(range(1, count($request->D8)), array_values($request->D8));
            $D9 = array_combine(range(1, count($request->D9)), array_values($request->D9));
            $D10 = array_combine(range(1, count($request->D10)), array_values($request->D10));
            $D11 = array_combine(range(1, count($request->D11)), array_values($request->D11));
            $D13 = array_combine(range(1, count($request->D13)), array_values($request->D13));
            $index = (is_array($D0)) ? array_key_first($D0) : 1;
            foreach ($D0 as $ii) {
                $item = InvoiceItem::create([
                    'user_id' => $user->id,
                    'taxpayer_id' => $taxpayer->id,
                    'invoice_id' => $invoice->id,
                    'sstid' => $D0[$index],
                    'sstt' => $D01[$index],
                    'am' => toFloatNumber($D2[$index]),
                    'mu' => $D1[$index],
                    'nw' => null,
                    'fee' => toFloatNumber($D3[$index]),
                    'cfee' => null,
                    'cut' => null,
                    'exr' => null,
                    'ssrv' => null,
                    'sscv' => null,
                    'prdis' => toFloatNumber($D4[$index]),
                    'dis' => toFloatNumber($D5[$index]),
                    'adis' => toFloatNumber($D6[$index]),
                    'vra' => $D7[$index],
//                    'vra' => 9,
                    'vam' => toFloatNumber($D8[$index]),
                    'odt' => null,
                    'odr' => null,
                    'odam' => toFloatNumber($D10[$index]),
                    'olt' => null,
                    'olr' => null,
                    'olam' => toFloatNumber($D9[$index]),
                    'consfee' => null,
                    'spro' => null,
                    'bros' => null,
                    'tcpbs' => null,
                    'cop' => null,
                    'vop' => null,
                    'bsrn' => $D13[$index],
                    'tsstam' => toFloatNumber($D11[$index]),
                ]);

                $index++;
            }
        }
        if ($is_send == 1)
            return $this->send($invoice->id);
        return back()->with('success', 'فاکتور با موفقیت ثبت شد.');
    }


    public function edit($id){
        $user = auth()->user();
        $invoice = Invoice::find($id);
        if ($invoice->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما دسترسی به این آیتم ندارید');
        $taxpayers = $user->taxpayers;
        $customers = $user->customers;
        $units = Unit::all();
//        $products = Product::all();
        $products = UserProduct::getUserProducts();
        if ($invoice->inp == 3)
            $v = 'user.factors.editGold';
        else
            $v = 'user.factors.edit';

        return view($v, compact('invoice', 'taxpayers', 'customers', 'units', 'products'));
    }

    public function adminEdit($id){
//        $user = auth()->user();
        $invoice = Invoice::find($id);
        $user = $invoice->user;
        if ($invoice->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما دسترسی به این آیتم ندارید');
        $taxpayers = $user->taxpayers;
        $customers = $user->customers;
        $units = Unit::all();
//        $products = Product::all();
        $products = UserProduct::getUserProducts(0, $user);
        if ($invoice->inp == 3)
            $v = 'user.factors.editGold';
        else
            $v = 'user.factors.edit';

        return view($v, compact('invoice', 'taxpayers', 'customers', 'units', 'products'));
    }

    public function print($id){
        $user = auth()->user();
        $invoice = Invoice::find($id);
        if ($invoice->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما دسترسی به این آیتم ندارید');
        return view('user.factors.print', compact('invoice'));
    }

    public function update(Request $request){
        $user = auth()->user();
        $invoice = Invoice::find($request->id);
        $taxpayer = Taxpayer::find($request->taxpayer_id);
        $customer = ($request->inty == 1) ? Customer::find($request->customer_id) : null;
        $is_send = (is_null($request->is_send)) ? 0 : 1;
        if (($taxpayer->user_id != $user->id || $invoice->user_id != $user->id) && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما به این آیتم دسترسی ندارید');
        if (!is_null($customer))
            if ( $customer->user_id != $user->id)
                return back()->with('fail', 'شما به این آیتم دسترسی ندارید');

        if ($invoice->status == Invoice::STATUS_VERIFY_SUCCESS)
            return back()->with('fail', 'این صورتحساب به سامانه معاملاتی ارسال شده و قابل ویرایش نمیباشد.لطفا برای ویرایش، فاکتور اصلاحی صادر کنید');




        $invoice->taxpayer_id = $taxpayer->id;
        $invoice->customer_id = ($request->inty == 1) ? $customer->id : null;

        $invoice->taxid = generateTaxId(
            new DateTime(toGeorgianDate($request->indatim)),
            intval(generateInno($taxpayer)),
            $taxpayer->username
        );
        $invoice->irtaxid = ($request->ins > 1) ? $request->irtaxid : $invoice->irtaxid;
        $invoice->inno = generateInno($taxpayer);
        $invoice->number = $request->number;
        $invoice->indatim = (strtotime(toGeorgianDate($request->indatim))*1000)."";
        $invoice->indati2m = (strtotime(toGeorgianDate($request->indatim))*1000)."";
        $invoice->inty = $request->inty;
        $invoice->ins = $request->ins;
        $invoice->inp = $request->inp;
        $invoice->tins = $taxpayer->economic_code;
//        $invoice->tins = $taxpayer->national_id;
        $invoice->tob = ($request->inty == 1) ? $customer->type : null;
        $invoice->bid = ($request->inty == 1) ? $customer->national_code : null;
        $invoice->tinb = ($request->inty == 1) ? $customer->economic_code : null;
        //$invoice->tinb = $customer->national_code;
        $invoice->sbc = $request->sbc;
        $invoice->bpc = ($request->inty == 1) ? $customer->postal_code : null;
        $invoice->bbc = $request->bbc;
//            $invoice->ft = null;
        $invoice->bpn = $request->bpn;
        $invoice->scln = $request->scln;
        $invoice->scc = $request->scc;
        $invoice->cdcn = $request->cdcn;
        $invoice->cdcd = (strlen($request->cdcd) > 0) ? intval(strtotime(toGeorgianDate($request->cdcd))/86400) : null;
        $invoice->crn = $request->crn;
        $invoice->billid = $request->billid;
        $invoice->tprdis = toFloatNumber($request->tprdis);
        $invoice->tdis = toFloatNumber($request->tdis);
        $invoice->tadis = toFloatNumber($request->tadis);
        $invoice->tvam = toFloatNumber($request->tvam);
        $invoice->todam = toFloatNumber($request->todam);
        $invoice->tbill = toFloatNumber($request->tbill);
        $invoice->tonw = toFloatNumber($request->tonw);
        $invoice->torv = toFloatNumber($request->torv);
        $invoice->tocv = toFloatNumber($request->tocv);
        $invoice->setm = $request->setm;
        $invoice->cap = toFloatNumber($request->cap);
        $invoice->insp = toFloatNumber($request->insp);
//            $invoice->tvop = null; //****
        $invoice->tax17 = toFloatNumber($request->tax17);
        $invoice->status = Invoice::STATUS_DRAFT;
        $invoice->send_response = null;
        $invoice->verify_response = null;
        $invoice->sent_at = null;
        $invoice->verified_at = null;
        $invoice->status = Invoice::STATUS_DRAFT;
        $invoice->save();
        foreach ($invoice->items as $item)
            $item->delete();


        //gold
        if ($invoice->inp == 3){
            $D0 = array_combine(range(1, count($request->D0)), array_values($request->D0));
            $D01 = array_combine(range(1, count($request->D01)), array_values($request->D01));
            $D1 = array_combine(range(1, count($request->D1)), array_values($request->D1));
            $D2 = array_combine(range(1, count($request->D2)), array_values($request->D2));
            $D3 = array_combine(range(1, count($request->D3)), array_values($request->D3));
            $D4 = array_combine(range(1, count($request->D4)), array_values($request->D4));
            $D5 = array_combine(range(1, count($request->D5)), array_values($request->D5));
            $D6 = array_combine(range(1, count($request->D6)), array_values($request->D6));
            $D7 = array_combine(range(1, count($request->D7)), array_values($request->D7));
            $D8 = array_combine(range(1, count($request->D8)), array_values($request->D8));
            $D9 = array_combine(range(1, count($request->D9)), array_values($request->D9));
            $D10 = array_combine(range(1, count($request->D10)), array_values($request->D10));
            $D11 = array_combine(range(1, count($request->D11)), array_values($request->D11));
            $D13 = array_combine(range(1, count($request->D13)), array_values($request->D13));
            $D14 = array_combine(range(1, count($request->D14)), array_values($request->D14));
            $index = (is_array($D0)) ? array_key_first($D0) : 1;
            foreach ($D0 as $ii) {
                $item = InvoiceItem::create([
                    'user_id' => $user->id,
                    'taxpayer_id' => $taxpayer->id,
                    'invoice_id' => $invoice->id,
                    'sstid' => $D0[$index],
                    'sstt' => $D01[$index],
                    'am' => toFloatNumber($D2[$index]),
                    'mu' => $D1[$index],
                    'nw' => null,
                    'fee' => toFloatNumber($D3[$index]),
                    'cfee' => null,
                    'cut' => null,
                    'exr' => null,
                    'ssrv' => null,
                    'sscv' => null,
                    'prdis' => toFloatNumber($D4[$index]),
                    'dis' => toFloatNumber($D5[$index]),
                    'adis' => toFloatNumber($D6[$index]),
                    'vra' => $D7[$index],
//                    'vra' => 9,
                    'vam' => toFloatNumber($D8[$index]),
                    'odt' => null,
                    'odr' => null,
                    'odam' => null,
                    'olt' => null,
                    'olr' => null,
                    'olam' => null,
                    'consfee' => toFloatNumber($D9[$index]),
                    'spro' => toFloatNumber($D10[$index]),
                    'bros' => toFloatNumber($D13[$index]),
                    'tcpbs' => toFloatNumber($D9[$index]) + toFloatNumber($D10[$index]) + toFloatNumber($D13[$index]),
                    'cui' => toFloatNumber($D14[$index]),
                    'cop' => null,
                    'vop' => null,
                    'bsrn' => null,
                    'tsstam' => toFloatNumber($D11[$index]),
                ]);

                $index++;
            }
        }else {

            $D0 = array_combine(range(1, count($request->D0)), array_values($request->D0));
            $D01 = array_combine(range(1, count($request->D01)), array_values($request->D01));
            $D1 = array_combine(range(1, count($request->D1)), array_values($request->D1));
            $D2 = array_combine(range(1, count($request->D2)), array_values($request->D2));
            $D3 = array_combine(range(1, count($request->D3)), array_values($request->D3));
            $D4 = array_combine(range(1, count($request->D4)), array_values($request->D4));
            $D5 = array_combine(range(1, count($request->D5)), array_values($request->D5));
            $D6 = array_combine(range(1, count($request->D6)), array_values($request->D6));
            $D7 = array_combine(range(1, count($request->D7)), array_values($request->D7));
            $D8 = array_combine(range(1, count($request->D8)), array_values($request->D8));
            $D9 = array_combine(range(1, count($request->D9)), array_values($request->D9));
            $D10 = array_combine(range(1, count($request->D10)), array_values($request->D10));
            $D11 = array_combine(range(1, count($request->D11)), array_values($request->D11));
            $D13 = array_combine(range(1, count($request->D13)), array_values($request->D13));
            $index = (is_array($D0)) ? array_key_first($D0) : 1;
            foreach ($D0 as $ii) {
                $item = InvoiceItem::create([
                    'user_id' => $user->id,
                    'taxpayer_id' => $taxpayer->id,
                    'invoice_id' => $invoice->id,
                    'sstid' => $D0[$index],
                    'sstt' => $D01[$index],
                    'am' => toFloatNumber($D2[$index]),
                    'mu' => $D1[$index],
                    'nw' => null,
                    'fee' => toFloatNumber($D3[$index]),
                    'cfee' => null,
                    'cut' => null,
                    'exr' => null,
                    'ssrv' => null,
                    'sscv' => null,
                    'prdis' => toFloatNumber($D4[$index]),
                    'dis' => toFloatNumber($D5[$index]),
                    'adis' => toFloatNumber($D6[$index]),
                'vra' => toFloatNumber($D7[$index]),
//                    'vra' => 9,
                    'vam' => toFloatNumber($D8[$index]),
                    'odt' => null,
                    'odr' => null,
                    'odam' => toFloatNumber($D10[$index]),
                    'olt' => null,
                    'olr' => null,
                    'olam' => toFloatNumber($D9[$index]),
                    'consfee' => null,
                    'spro' => null,
                    'bros' => null,
                    'tcpbs' => null,
                    'cop' => null,
                    'vop' => null,
                    'bsrn' => $D13[$index],
                    'tsstam' => toFloatNumber($D11[$index]),
                ]);

                $index++;
            }
        }

        if ($is_send == 1)
            return $this->send($invoice->id);

        return back()->with('success', 'فاکتور با موفقیت ویرایش شد');
    }


    public function delete($id){
        $user = auth()->user();
        $invoice = Invoice::find($id);
        if ($invoice->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما دسترسی به این آیتم ندارید');
        if ($invoice->status != Invoice::STATUS_DRAFT && $invoice->status != Invoice::STATUS_VERIFY_FAIL)
            return back()->with('fail', 'این صورت حساب امکان حذف ندارد.');
        $invoice->delete();
        return back()->with('success', 'صورتحساب با موفقیت حذف شد.');

    }
    public function send($id){
        $user = auth()->user();
        $invoice = Invoice::find($id);
        if ($invoice->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما دسترسی به این آیتم ندارید');
//        if ($invoice->status != Invoice::STATUS_DRAFT)
//            return back()->with('fail', 'این فاکتور قبلا ارسال شده است');
        $moadian = new Moadian($invoice->username, $invoice->private_key);
        try {
            $result = $moadian->sendInvoice($invoice->toMoadianInvoice());
        }catch (RequestException $e){
            return back()->with('fail', 'شناسه یکتا یا کلید خصوصی شما اشتباه می باشد.');
        }

        $info = $result->getBody();
        $invoice->send_response = json_encode($info, JSON_UNESCAPED_UNICODE);
        $invoice->sent_at = date('Y-m-d H:i:s');
        $invoice->status = ($result->isSuccessful()) ? Invoice::STATUS_SENT_SUCCESS : Invoice::STATUS_SENT_FAIL;
        $info = $info[0];
        $invoice->uid             = $info['uid'] ?? '';
        $invoice->refrence_number = $info['referenceNumber'] ?? '';
        $invoice->send_error = $info['errorCode'] ?? '' . '#'. $result->getError();
        $invoice->save();
        if (!$result->isSuccessful()){
            $err_code = $info['errorCode'] ?? '';
            $err_detail = $info['errorDetail'] ?? '';
            $success = '';
            $fail = "خطا در ارسال<br>کد خطا:$err_code ### متن خطا:$err_detail";
            return back()->with('success', $success)->with('fail', $fail);
        }
        sleep(2);
        return $this->verify($invoice->id);
    }

    public function expire($id){
        $user = auth()->user();
        $invoice = Invoice::find($id);
        $taxpayer = $invoice->taxpayer;
        if ($invoice->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما دسترسی به این آیتم ندارید');
        if ($invoice->status != Invoice::STATUS_VERIFY_SUCCESS )
            return back()->with('fail', 'این فاکتور قابل ابطال نیست');

        //check user credit
        $can_insert = false;
        $i_package = UserInfinitePackage::where('user_id', '=', $user->id)
            ->where('taxpayer_id', '=', $taxpayer->id)
            ->where('to_date', '>=', date('Y-m-d'))->first();
        if (!is_null($i_package)) $can_insert = true;
        if (!$can_insert){
            $p_package = UserPublicPackage::where('user_id', '=', $user->id)->where('remain_count', '>', 0)->first();
            if (!is_null($p_package)){
                $p_package->remain_count = $p_package->remain_count - 1;
                $p_package->save();
                $can_insert = true;
            }
        }
        if (!$can_insert)
            return back()->with('fail', 'شما هیچ بسته فعالی برای این مودی ندارید.لطفا اقدام به خرید بسته نمایید.');

        $new_invoice = $invoice->replicate();
        $new_invoice->status = Invoice::STATUS_DRAFT;
        $new_invoice->username = $taxpayer->username;
        $new_invoice->private_key = $taxpayer->private_key;
        $new_invoice->send_response = null;
        $new_invoice->verify_response = null;
        $new_invoice->sent_at = null;
        $new_invoice->verified_at = null;
        $new_invoice->uid = null;
        $date = date('Y-m-d');
        $new_invoice->taxid = generateTaxId(
            new DateTime($date),
            intval(generateInno($taxpayer)),
            $taxpayer->username
        );
        $new_invoice->irtaxid = $invoice->taxid;
        $new_invoice->indatim = (strtotime($date)*1000)."";
        $new_invoice->indati2m = (strtotime($date)*1000)."";
        $new_invoice->inno = generateInno($taxpayer);
        $new_invoice->ins = 3;
        $new_invoice->save();
        foreach ($invoice->items as $item) {
            $new_item = $item->replicate();
            $new_item->invoice_id = $new_invoice->id;
            $new_item->save();
        }
        foreach ($invoice->payments as $item) {
            $new_item = $item->replicate();
            $new_item->invoice_id = $new_invoice->id;
            $new_item->save();
        }


        $moadian = new Moadian($new_invoice->username, $new_invoice->private_key);
        try{
            $result = $moadian->sendInvoice($new_invoice->toMoadianInvoice());
        }catch (RequestException $e){
            return back()->with('fail', 'شناسه یکتا یا کلید خصوصی شما اشتباه می باشد.');
        }

        $info = $result->getBody();
        $new_invoice->send_response = json_encode($info, JSON_UNESCAPED_UNICODE);
        $new_invoice->sent_at = date('Y-m-d H:i:s');
        $new_invoice->status = ($result->isSuccessful()) ? Invoice::STATUS_SENT_SUCCESS : Invoice::STATUS_SENT_FAIL;
        $info = $info[0];
        $new_invoice->uid             = $info['uid'] ?? '';
        $new_invoice->refrence_number = $info['referenceNumber'] ?? '';
        $new_invoice->send_error = $info['errorCode'] ?? '' . '#'. $result->getError();
        $new_invoice->save();
        if (!$result->isSuccessful()){
            $err_code = $info['errorCode'] ?? '';
            $err_detail = $info['errorDetail'] ?? '';
            $success = '';
            $fail = "خطا در ارسال<br>کد خطا:$err_code ### متن خطا:$err_detail";
            return back()->with('success', $success)->with('fail', $fail);
        }
        return $this->verify($new_invoice->id);
    }

    public function copy($id){
        $user = auth()->user();
        $invoice = Invoice::find($id);
        if ($invoice->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما دسترسی به این آیتم ندارید');
        if ($invoice->ins != 1)
            return back()->with('fail', 'این فاکتور قابلیت کپی ندارد');
        $taxpayer = $invoice->taxpayer;

        //check user credit
        $can_insert = false;
        $i_package = UserInfinitePackage::where('user_id', '=', $user->id)
            ->where('taxpayer_id', '=', $taxpayer->id)
            ->where('to_date', '>=', date('Y-m-d'))->first();
        if (!is_null($i_package)) $can_insert = true;
        if (!$can_insert){
            $p_package = UserPublicPackage::where('user_id', '=', $user->id)->where('remain_count', '>', 0)->first();
            if (!is_null($p_package)){
                $p_package->remain_count = $p_package->remain_count - 1;
                $p_package->save();
                $can_insert = true;
            }
        }
        if (!$can_insert)
            return back()->with('fail', 'شما هیچ بسته فعالی برای این مودی ندارید.لطفا اقدام به خرید بسته نمایید.');


        $new_invoice = $invoice->replicate();
        $new_invoice->status = Invoice::STATUS_DRAFT;
        $new_invoice->taxid = generateTaxId(
                new DateTime(toGeorgianDate($invoice->indatim)),
                intval(generateInno($taxpayer)),
                $taxpayer->username
            );
        $new_invoice->inno = generateInno($taxpayer);
        $new_invoice->username = $taxpayer->username;
        $new_invoice->private_key = $taxpayer->private_key;
        $new_invoice->created_at = date("Y-m-d H:i:s");
        $new_invoice->updated_at = date("Y-m-d H:i:s");
        $new_invoice->save();
        foreach ($invoice->items as $item) {
            $new_item = $item->replicate();
            $new_item->invoice_id = $new_invoice->id;
            $new_item->created_at = date("Y-m-d H:i:s");
            $new_item->updated_at = date("Y-m-d H:i:s");
            $new_item->save();
        }
        return redirect(route('invoice.edit', $new_invoice->id))->with('success', 'فاکتور کپی شد.می توانید برای ویرایش آن اقدام نمایید.');
    }

    public function verify($id){
        $user = auth()->user();
        $invoice = Invoice::find($id);
        if ($invoice->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما دسترسی به این آیتم ندارید.');

        try {
            $moadian = new Moadian($invoice->username, $invoice->private_key);
            $result = $moadian->inquiryByReferenceNumbers([$invoice->refrence_number]);
            $info = $result->getBody();
            $invoice->verify_response = json_encode($info, JSON_UNESCAPED_UNICODE);
            $invoice->verified_at = date('Y-m-d H:i:s');
            $info = $info[0];
            $invoice->verify_error = $info['errorCode'] ?? '' . '#'. $result->getError();
//            $invoice->status = ($info['status'] == 'SUCCESS') ? Invoice::STATUS_VERIFY_SUCCESS : Invoice::STATUS_VERIFY_FAIL;
            $invoice->save();
            if ($info['status'] == 'SUCCESS') {
                $invoice->status = Invoice::STATUS_VERIFY_SUCCESS;
                $invoice->save();
                return back()->with('success', 'فاکتور شما باموفقیت در سامانه مرکزی ثبت شده است.');
            }elseif($info['status'] == 'FAILED') {
                $invoice->status = Invoice::STATUS_VERIFY_FAIL;
                $invoice->save();
                return back()->with('fail', 'مشکلی در استعلام فاکتور وجود دارد.لطفا خطاهای مربوط به فاکتور را در صفحه ویرایش فاکتور بررسی نمایید.');
            }else {
                $invoice->status = Invoice::STATUS_VERIFY_PENDING;
                $invoice->save();
                return back()->with('fail', 'فاکتور شما در انتظار ثبت در سامانه مرکزی است.');
            }

        }catch (\Exception $e){
            return back()->with('fail', 'مشکلی در استعلام فاکتور وجود دارد.لطفا برای اطلاعات بیشتر از طریق تیکت با مدیریت ارتباط بگیرید');
        }

    }


    public function canInsertInvoiceAjax($taxpayer_id){
        $user = auth()->user();
        $taxpayer = Taxpayer::find($taxpayer_id);
        if ($taxpayer->user_id != $user->id)
            return responseJson(0, [], 'شما دسترسی به این مودی ندارید.');
        //check user credit
        $can_insert = false;
        $i_package = UserInfinitePackage::where('user_id', '=', $user->id)
            ->where('taxpayer_id', '=', $taxpayer->id)
            ->where('to_date', '>=', date('Y-m-d'))->first();
        if (!is_null($i_package)) $can_insert = true;
        if (!$can_insert){
            $p_package = UserPublicPackage::where('user_id', '=', $user->id)->where('remain_count', '>', 0)->first();
            if (!is_null($p_package)) $can_insert = true;
        }
        if (!$can_insert)
            return responseJson(0, [], 'شما هیچ بسته فعالی برای این مودی ندارید.لطفا اقدام به خرید بسته نمایید.');
        return responseJson(1, [], 'شما بسته فعال برای این مودی دارید.');
    }

}
