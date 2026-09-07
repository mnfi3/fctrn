<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function create(){
        $users = User::orderBy('id', 'desc')->get();
        return view('manager.discount.add-discount', compact('users'));
    }

    public function index(){
        $discounts = Discount::orderBy('id', 'desc')->get();
        return view('manager.discount.discounts', compact('discounts'));
    }

    public function insert(Request $request){
        $user = auth()->user();
        $discount = Discount::create([
            'user_id' => $user->id,
            'code' => $request->code,
            'discount_type' => $request->discount_type,
            'amount' => $request->amount,
            'expired_at' => toGeorgianDate($request->expired_at),
            'count' => $request->count,
            'used' => 0,
            'users' => json_encode($request->users),
            'type' => $request->type,
            'description' => $request->description,
        ]);
        return back()->with('success', 'کد تخفیف با موفقیت ایجاد شد.');
    }

    public function edit($id){
        $discount = Discount::find($id);
        $users = User::orderBy('id', 'desc')->get();
        return view('manager.discount.edit-discount', compact('users', 'discount'));
    }

    public function update(Request $request){
        $user = auth()->user();
        $discount = Discount::find($request->id);
        $discount->code = $request->code;
        $discount->discount_type = $request->discount_type;
        $discount->amount = $request->amount;
        $discount->expired_at = toGeorgianDate($request->expired_at);
        $discount->count = $request->count;
        $discount->users = json_encode($request->users);
        $discount->type = $request->type;
        $discount->description = $request->description;
        $discount->save();
        return back()->with('success', 'کد تخفیف با موفقیت ویرایش شد.');
    }

    public function delete($id){
        $discount = Discount::find($id);
        $discount->delete();
        return back()->with('success', 'کد تخفیف با موفقیت حذف شد.');
    }

    public function verify(Request $request){
        $user = auth()->user();
        $code = $request->code;
        $type = $request->type;

        $discount = Discount::orderBy('id', 'desc')->where('code', '=', $code)->first();

        if (is_null($discount))
            return responseJson(0, null, 'کد وارد شده اشتباه است.');
        if (date('Y-m-d') > $discount->expired_at)
            return responseJson(0, null, 'کد تخفیف منقضی شده است.');
        if ($discount->count <= $discount->used)
            return responseJson(0, null, 'تعداد استفاده از این کد تخفیف به اتمام رسیده است.');
        $discount_users = $discount->users;
        try {
            $discount_users = json_decode($discount_users, true);
        }catch (\Exception $e){
            $discount_users = [];
        }
        if (!in_array($user->id, $discount_users) && !in_array(0, $discount_users))
            return responseJson(0, null, 'این کد تخفیف برای شما تعریف نشده است.');
        if($discount->type == Discount::TYPE_INFINITE && $type == Discount::TYPE_PUBLIC)
            return responseJson(0, null, 'این کد تخفیف فقط برای خرید بسته های نامحدود تعریف شده است.');
        if($discount->type == Discount::TYPE_PUBLIC && $type == Discount::TYPE_INFINITE)
            return responseJson(0, null, 'این کد تخفیف فقط برای خرید بسته های اعتباری تعریف شده است.');
        $payment = Payment::where('user_id', '=', $user->id)->where('discount_id', '=', $discount->id)->where('is_success', '=', 1)->first();
        if (!is_null($payment))
            return responseJson(0, null, 'شما قبلا از این کد تخفیف استفاده کرده اید.');

        return response()->json([
            'status' => 1,
            'message' => 'کد تخفیف معتبر است.',
            'discount' => ['amountOfDiscount' => $discount->amount,'discount_type' => $discount->discount_type,'description' => $discount->description],

        ]);;
    }


}
