<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\InfinitePackage;
use App\Models\Moadian\Taxpayer;
use App\Models\Moadian\UserInfinitePackage;
use App\Models\Moadian\UserPublicPackage;
use App\Models\Payment;
use App\Models\PaymentRequest;
use App\Models\PublicPackage;
use App\Models\Setting;
use App\Saman;
use App\Sayan;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['samanVerify']]);
        $this->middleware('access', ['except' => ['samanVerify']]);
    }


    public function index(){
        $user = auth()->user();
        $payments = $user->payments()->orderBy('created_at', 'desc')->paginate(100);
        return view('user.payments.index', compact('payments'));
    }

    public function pricing(){
        $user = auth()->user();
        $taxpayers = $user->taxpayers()->orderBy('id', 'desc')->get();
        $infinite_packages = InfinitePackage::all();
        $public_packages = PublicPackage::all();
        return view('user.payments.pricing', compact('taxpayers', 'infinite_packages', 'public_packages'));
    }

    public function infinitePackage(Request $request){
        $user = auth()->user();
        $discount_code = $request->code;
        $discount_amount = 0;
        $dicount_id = null;
        $discount_type = -1;
        $taxpayer = Taxpayer::find($request->taxpayer_id);
        $package_id = $request->package_id;
        if ($taxpayer->user_id != $user->id)
            return back()->with('fail', 'شما دسترسی به این مودی را ندارید.');
            
        $package = InfinitePackage::find($package_id);
        $cost = $package->cost;
        
        if ($user->is_admin_register == 1 && $user->is_payed_register_cost == 0)
            $cost += $user->register_cost;
            
        if (strlen($discount_code) > 0) {
            $result = $this->discountVerifier($discount_code, Discount::TYPE_INFINITE);
            if ($result == true) {
                $discount = Discount::orderBy('id', 'desc')->where('code', '=', $discount_code)->first();
                $discount_type = $discount->discount_type;
                $discount_amount = $discount->amount;
                $dicount_id = $discount->id;
            }else{
                return $result;
            }
        }

        if ($discount_type == -1)// no discount
            $cost = $cost + ((int)($cost*10/100));
        elseif ($discount_type == 0)//percent discount
            $cost = $cost - ((int)($package->cost * $discount_amount / 100));
        elseif($discount_type == 1)//amount discount
            $cost = (int)($package->cost - $discount_amount);


        

        $p_request = PaymentRequest::create([
            'user_id' => $user->id,
            'discount_id' => $dicount_id,
            'payment_request_able_id' => $package->id,
            'payment_request_able_type' => InfinitePackage::class,
            'bank_name' => env('BANK_NAME'),
            'amount' => $cost,
            'token' => null,
            'data' => $taxpayer->id,
            'is_verified' => 0,
        ]);

        if (env('BANK_NAME') == Setting::KEY_BANK_SAMAN) {
            $terminal_id = env('KEY_SAMAN_TERMINAL_ID');
            $mid = env('KEY_SAMAN_MID');
            $purchase_id = env('KEY_SAMAN_PURCHASE_ID');
            $shba = env('KEY_SAMAN_SHBA');
            $saman = new Saman(
                $terminal_id,
                $mid,
                $purchase_id,
                $shba
            );
            $response = $saman->requestToken($cost, $p_request->id, route('payment.saman.verify'), $user->mobile);
            if ($response->status != 1) {
                $description = $response->errorDesc;
                return view('user.payments.paymentFailed', compact('description'));
            } else {
                return $saman->redirecToPaymentPage($response->token);
            }
        }elseif (env('BANK_NAME') == Setting::KEY_BANK_SAYAN){
            $username = env('KEY_SAYAN_USERNAME');
            $password = env('KEY_SAYAN_PASSWORD');
            $terminal_id = env('KEY_SAYAN_TERMINAL_ID');
            $mid = env('KEY_SAYAN_MID');
            $sayan = new Sayan($username, $password, $terminal_id, $mid);
            $response = $sayan->requestToken($cost, $p_request->id, route('payment.sayan.verify'));
            $token = optional($response)->token;
            if (strlen($token) > 0)
                return $sayan->redirectToPaymentPage($token);
            else {
                $description = 'خطا در پرداخت(دریافت توکن)';
                return view('user.payments.paymentFailed', compact('description'));
            }
        }else{
            return 'اطلاعات درگاه وارد نشده است';
        }
    }

    public function publicPackage(Request $request){
        $user = auth()->user();
        $discount_code = $request->code;
        $discount_amount = 0;
        $discount_id = null;
        $discount_type = -1;
        $package_id = $request->package_id;
        $package = PublicPackage::find($package_id);
        $cost = $package->cost;
        
        
        if ($user->is_admin_register == 1 && $user->is_payed_register_cost == 0)
            $cost += $user->register_cost;

        if (strlen($discount_code) > 0) {
            $result = $this->discountVerifier($discount_code, Discount::TYPE_PUBLIC);
            if ($result == true) {
                $discount = Discount::orderBy('id', 'desc')->where('code', '=', $discount_code)->first();
                $discount_amount = $discount->amount;
                $discount_type = $discount->discount_type;
                $discount_id = $discount->id;
            }else{
                return $result;
            }
        }

        if ($discount_type == -1)// no discount
            $cost = $cost + ((int)($cost*10/100));
        elseif ($discount_type == 0)//percent discount
            $cost = $cost - ((int)($package->cost * $discount_amount / 100));
        elseif($discount_type == 1)//amount discount
            $cost = (int)($package->cost - $discount_amount);



        $p_request = PaymentRequest::create([
            'user_id' => $user->id,
            'discount_id' => $discount_id,
            'payment_request_able_id' => $package->id,
            'payment_request_able_type' => PublicPackage::class,
            'bank_name' => env('BANK_NAME'),
            'amount' => $cost,
            'token' => null,
            'data' => null,
            'is_verified' => 0,
        ]);


        if (env('BANK_NAME') == Setting::KEY_BANK_SAMAN) {
            $terminal_id = env('KEY_SAMAN_TERMINAL_ID');
            $mid = env('KEY_SAMAN_MID');
            $purchase_id = env('KEY_SAMAN_PURCHASE_ID');
            $shba = env('KEY_SAMAN_SHBA');
            $saman = new Saman(
                $terminal_id,
                $mid,
                $purchase_id,
                $shba
            );
            $response = $saman->requestToken($cost, $p_request->id, route('payment.saman.verify'), $user->mobile);
            if ($response->status != 1) {
                $description = $response->errorDesc;
                return view('user.payments.paymentFailed', compact('description'));
            } else {
                return $saman->redirecToPaymentPage($response->token);
            }
        }elseif(env('BANK_NAME') == Setting::KEY_BANK_SAYAN){
            $username = env('KEY_SAYAN_USERNAME');
            $password = env('KEY_SAYAN_PASSWORD');
            $terminal_id = env('KEY_SAYAN_TERMINAL_ID');
            $mid = env('KEY_SAYAN_MID');
            $sayan = new Sayan($username, $password, $terminal_id, $mid);
            $response = $sayan->requestToken($cost, $p_request->id, route('payment.sayan.verify'));
            $token = optional($response)->token;
            if (strlen($token) > 0)
                return $sayan->redirectToPaymentPage($token);
            else {
                $description = 'خطا در پرداخت(دریافت توکن)';
                return view('user.payments.paymentFailed', compact('description'));
            }
        }else{
            return 'اطلاعات درگاه وارد نشده است';
        }
    }





    public function samanVerify() {
        $MID = $_POST['MID'];
        $state = $_POST['State'];
        $status = $_POST['Status'];
        $RRN = $_POST['Rrn'];
        $ref_num = $_POST['RefNum'];
        $order_id = $_POST['ResNum'];
        $terminal_id = $_POST['TerminalId'];
        $trace_no = $_POST['TraceNo'];
        $amount = $_POST['Amount'];
        $wage = $_POST['Wage'];
        $secure_pan = $_POST['SecurePan'];

        $retrival_ref_no = $RRN;
        $system_trace_no = $trace_no;

        $p_request = PaymentRequest::find($order_id);
        if (is_null($p_request)) abort(404);
        if ($p_request->is_verified == 1) return redirect(route('home'));

        auth()->loginUsingId($p_request->user_id);
        if ($status != 2) {
            $payment = Payment::create([
                'user_id' => $p_request->user_id,
                'discount_id' => $p_request->discount_id,
                'paymentable_id' => $p_request->payment_request_able_id,
                'paymentable_type' => $p_request->payment_request_able_type,
                'bank_name' => Setting::KEY_BANK_SAMAN,
                'amount' => $p_request->amount,
                'receipt' => null,
                'data' => null,
                'is_success' => 0,
            ]);
            $p_request->is_verified = 1;
            $p_request->save();
            $message = Saman::$status_messages[$status];
            $description = " تراکنش ناموفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.$message";
            return view('user.payments.paymentFailed', compact('description'));
        }

        $terminal_id = env('KEY_SAMAN_TERMINAL_ID');
        $mid = env('KEY_SAMAN_MID');
        $purchase_id = env('KEY_SAMAN_PURCHASE_ID');
        $shba = env('KEY_SAMAN_SHBA');
        $saman = new Saman(
            $terminal_id,
            $mid,
            $purchase_id,
            $shba
        );
        $verify_response = $saman->verify($ref_num);


        //fail
        if ($verify_response->Success == null){
            $payment = Payment::create([
                'user_id' => $p_request->user_id,
                'discount_id' => $p_request->discount_id,
                'paymentable_id' => $p_request->payment_request_able_id,
                'paymentable_type' => $p_request->payment_request_able_type,
                'bank_name' => Setting::KEY_BANK_SAMAN,
                'amount' => $p_request->amount,
                'receipt' => null,
                'data' => null,
                'is_success' => 0,
            ]);
            $p_request->is_verified = 1;
            $p_request->save();
            $description = " تراکنش ناموفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.";
            return view('user.payments.paymentFailed', compact('description'));
        }

        //fail
        if ($verify_response->Success != true ){
            $payment = Payment::create([
                'user_id' => $p_request->user_id,
                'discount_id' => $p_request->discount_id,
                'paymentable_id' => $p_request->payment_request_able_id,
                'paymentable_type' => $p_request->payment_request_able_type,
                'bank_name' => Setting::KEY_BANK_SAMAN,
                'amount' => $p_request->amount,
                'receipt' => null,
                'data' => null,
                'is_success' => 0,
            ]);
            $p_request->is_verified = 1;
            $p_request->save();
//      $message = Saman::$verify_messages[$amount];
            $message = $verify_response->ResultDescription;
            $description = " تراکنش ناموفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.$message";
            return view('user.payments.paymentFailed', compact('description'));
        }

        //fail
        if ($verify_response->TransactionDetail->OrginalAmount  != $p_request->amount){
            $payment = Payment::create([
                'user_id' => $p_request->user_id,
                'discount_id' => $p_request->discount_id,
                'paymentable_id' => $p_request->payment_request_able_id,
                'paymentable_type' => $p_request->payment_request_able_type,
                'bank_name' => Setting::KEY_BANK_SAMAN,
                'amount' => $p_request->amount,
                'receipt' => null,
                'data' => null,
                'is_success' => 0,
            ]);
            $p_request->is_verified = 1;
            $p_request->save();
//      $message = $verify_response->ResultDescription;
            $description = " مبلغ پرداخت شده با مبلغ سفارش برابر نیست.لطفا با مدیریت تماس بگیرید";
            return view('user.payments.paymentFailed', compact('description'));
        }




        //success
        if ($p_request->payment_request_able_type == InfinitePackage::class){
            $p = InfinitePackage::find($p_request->payment_request_able_id);
            $day_count = $p->day_count;
            $user_p = UserInfinitePackage::create([
                'user_id' => $p_request->user_id,
                'taxpayer_id' => $p_request->data,
                'cost' => $p_request->amount,
                'from_date' => date("Y-m-d H:i:s"),
                'to_date' => date("Y-m-d H:i:s", strtotime("+$day_count days")),
            ]);
        }else{
            $p = PublicPackage::find($p_request->payment_request_able_id);
            $user_p = UserPublicPackage::create([
                'user_id' => $p_request->user_id,
                'cost' => $p_request->amount,
                'all_count' => $p->invoice_count,
                'remain_count' => $p->invoice_count,
            ]);
        }

        $data = [
            'mid' => $MID,
            'state' => $state,
            'status' => $status,
            'rrn' => $RRN,
            'ref_num' => $ref_num,
            'res_num' => $order_id,
            'terminal_id' => $terminal_id,
            'trace_no' => $trace_no,
            'amount' => $amount,
            'wage' => $wage,
            'secure_pan' => $secure_pan,
        ];
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $payment = Payment::create([
            'user_id' => $p_request->user_id,
            'discount_id' => $p_request->discount_id,
            'paymentable_id' => $p_request->payment_request_able_id,
            'paymentable_type' => $p_request->payment_request_able_type,
            'bank_name' => Setting::KEY_BANK_SAMAN,
            'amount' => $p_request->amount,
            'receipt' => $system_trace_no,
            'data' => $data,
            'is_success' => 1,
        ]);

         $discount = Discount::find($p_request->discount_id);
        if (!is_null($discount)){
            $discount->used = $discount->used + 1;
            $discount->save();
        }

        $p_request->is_verified = 1;
        $p_request->save();
        if ($user->is_admin_register == 1 && $user->is_payed_register_cost == 0) {
            $user->is_payed_register_cost = 1;
            $user->save();
        }

        $description = 'پرداخت با موفقیت انجام شد';
        return view('user.payments.paymentSuccess', compact(['description', 'retrival_ref_no', 'system_trace_no', 'amount']));
    }

    public function sayanVerify() {
        $state = $_POST['State'];
        $token=$_POST['token'];
        $RefNum=$_POST['RefNum'];
        $p_request = PaymentRequest::find($RefNum);
        if (is_null($p_request)) abort(404);
        if ($p_request->is_verified == 1) return redirect(route('home'));

        //fail
        if ($state != 'OK'){
            $payment = Payment::create([
                'user_id' => $p_request->user_id,
                'discount_id' => $p_request->discount_id,
                'paymentable_id' => $p_request->payment_request_able_id,
                'paymentable_type' => $p_request->payment_request_able_type,
                'bank_name' => Setting::KEY_BANK_SAYAN,
                'amount' => $p_request->amount,
                'receipt' => null,
                'data' => null,
                'is_success' => 0,
            ]);
            $p_request->is_verified = 1;
            $p_request->save();
            $description = " تراکنش ناموفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.";
            return view('user.payments.paymentFailed', compact('description'));
        }


        $username = env('KEY_SAYAN_USERNAME');
        $password = env('KEY_SAYAN_PASSWORD');
        $terminal_id = env('KEY_SAYAN_TERMINAL_ID');
        $mid = env('KEY_SAYAN_MID');
        $sayan = new Sayan($username, $password, $terminal_id, $mid);
        $response = $sayan->verify($token, $RefNum);

        $RefVerify=($response->RefNum);
        $amount=($response->Amount);
        auth()->loginUsingId($p_request->user_id);
        //fail
        if($response->Result!='erSucceed'){
            $payment = Payment::create([
                'user_id' => $p_request->user_id,
                'discount_id' => $p_request->discount_id,
                'paymentable_id' => $p_request->payment_request_able_id,
                'paymentable_type' => $p_request->payment_request_able_type,
                'bank_name' => Setting::KEY_BANK_SAYAN,
                'amount' => $p_request->amount,
                'receipt' => null,
                'data' => null,
                'is_success' => 0,
            ]);
            $p_request->is_verified = 1;
            $p_request->save();
            $description = " تراکنش ناموفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.";
            return view('user.payments.paymentFailed', compact('description'));
        }


        //success
        if ($p_request->payment_request_able_type == InfinitePackage::class){
            $p = InfinitePackage::find($p_request->payment_request_able_id);
            $day_count = $p->day_count;
            $user_p = UserInfinitePackage::create([
                'user_id' => $p_request->user_id,
                'taxpayer_id' => $p_request->data,
                'cost' => $p_request->amount,
                'from_date' => date("Y-m-d H:i:s"),
                'to_date' => date("Y-m-d H:i:s", strtotime("+$day_count days")),
            ]);
        }else{
            $p = PublicPackage::find($p_request->payment_request_able_id);
            $user_p = UserPublicPackage::create([
                'user_id' => $p_request->user_id,
                'cost' => $p_request->amount,
                'all_count' => $p->invoice_count,
                'remain_count' => $p->invoice_count,
            ]);
        }

        $data = $response;
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $payment = Payment::create([
            'user_id' => $p_request->user_id,
            'discount_id' => $p_request->discount_id,
            'paymentable_id' => $p_request->payment_request_able_id,
            'paymentable_type' => $p_request->payment_request_able_type,
            'bank_name' => Setting::KEY_BANK_SAYAN,
            'amount' => $p_request->amount,
            'receipt' => $ref_num,
            'data' => $data,
            'is_success' => 1,
        ]);

        $discount = Discount::find($p_request->discount_id);
        if (!is_null($discount)){
            $discount->used = $discount->used + 1;
            $discount->save();
        }

        $p_request->is_verified = 1;
        $p_request->save();
        if ($user->is_admin_register == 1 && $user->is_payed_register_cost == 0) {
            $user->is_payed_register_cost = 1;
            $user->save();
        }

        $description = 'پرداخت با موفقیت انجام شد';
        return view('user.payments.paymentSuccess', compact(['description', 'retrival_ref_no', 'system_trace_no', 'amount']));

    }





    public function discountVerifier($code, $type){
        $user = auth()->user();

        $discount = Discount::orderBy('id', 'desc')->where('code', '=', $code)->first();
        if (is_null($discount))
            return back()->with('fail', 'کد وارد شده اشتباه است.');
        if (date('Y-m-d') > $discount->expired_at)
            return back()->with('fail', 'کد تخفیف منقضی شده است.');
        if ($discount->count <= $discount->used)
            return back()->with('fail', 'تعداد استفاده از این کد تخفیف به اتمام رسیده است.');
        $discount_users = $discount->users;
        try {
            $discount_users = json_decode($discount_users, true);
        }catch (\Exception $e){
            $discount_users = [];
        }
        if (!in_array($user->id, $discount_users) && !in_array(0, $discount_users))
            return back()->with('fail', 'این کد تخفیف برای شما تعریف نشده است.');
        if($discount->type == Discount::TYPE_INFINITE && $type == Discount::TYPE_PUBLIC)
            return back()->with('fail', 'این کد تخفیف فقط برای خرید بسته های نامحدود تعریف شده است.');
        if($discount->type == Discount::TYPE_PUBLIC && $type == Discount::TYPE_INFINITE)
            return back()->with('fail', 'این کد تخفیف فقط برای خرید بسته های اعتباری تعریف شده است.');
        $payment = Payment::where('user_id', '=', $user->id)->where('discount_id', '=', $discount->id)->where('is_success', '=', 1)->first();
        if (!is_null($payment))
            return back()->with('fail', 'شما قبلا از این کد تخفیف استفاده کرده اید.');
        return true;
    }
}
