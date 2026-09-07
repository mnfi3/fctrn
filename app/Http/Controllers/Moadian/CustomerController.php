<?php

namespace App\Http\Controllers\Moadian;

use App\Http\Controllers\Controller;
use App\Models\Moadian\Customer;
use App\Models\Moadian\Taxpayer;
use App\Models\Role;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function index(Request $request){
        $customers = Customer::where('user_id', '=', auth()->user()->id)->paginate(20);
        return view('user.customers.index', compact('customers'));
    }

    public function create(){
        $taxpayers = Taxpayer::where('user_id', '=', auth()->user()->id)->get();
        return view('user.customers.create', compact('taxpayers'));
    }

    public function insert(Request $request){
        $customer = Customer::create([
            'user_id' => auth()->user()->id,
            'taxpayer_id' => 0,
            'name' => $request->name,
            'type' => $request->type,
            'national_code' => $request->national_code,
            'economic_code' => $request->economic_code,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'insert_number' => $request->insert_number,
            'fax' => $request->fax,
        ]);
        return back()->with('success', 'مشتری با موفقیت ثبت شد');
    }

    public function edit($id){
        $customer = Customer::find($id);
        if ($customer->user_id != auth()->user()->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما به این آیتم دسترسی ندارید');
        return view('user.customers.edit', compact('customer'));
    }

    public function update(Request $request){
        $customer = Customer::find($request->id);
        if ($customer->user_id != auth()->user()->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما به این آیتم دسترسی ندارید');
        $customer->name = $request->name;
        $customer->type = $request->type;
        $customer->national_code = $request->national_code;
        $customer->economic_code = $request->economic_code;
        $customer->postal_code = $request->postal_code;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->state = $request->state;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->insert_number = $request->insert_number;
        $customer->fax = $request->fax;
        $customer->save();
        return  back()->with('success', 'اطلاعات مشتری با موفقیت ویرایش شد');
    }

    public function delete($id){
        $customer = Customer::find($id);
        if ($customer->user_id != auth()->user()->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما به این آیتم دسترسی ندارید');
        $customer->delete();
        return back()->with('success', 'اطلاعات مشتری با موفقیت حذف شد');
    }
}
