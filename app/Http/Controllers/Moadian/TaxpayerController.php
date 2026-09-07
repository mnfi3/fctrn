<?php

namespace App\Http\Controllers\Moadian;

use App\Http\Controllers\Controller;
use App\Models\Moadian\Customer;
use App\Models\Moadian\Taxpayer;
use App\Models\Role;
use Illuminate\Http\Request;

class TaxpayerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function index(){
        $taxpayers = Taxpayer::where('user_id', '=', auth()->user()->id)->withTrashed()->paginate(20);
        return view('user.moadian.index', compact('taxpayers'));
    }

    public function create(){
        return view('user.moadian.create');
    }

    public function insert(Request $request) {
        $user = auth()->user();
        $taxpayer = Taxpayer::create([
            'user_id' => $user->id,
            'type' => Taxpayer::TYPE_COMPANY,
            'name' => $request->name,
            'national_id' => $request->national_id,
            'postal_code' => $request->postal_code,
            'economic_code' => $request->economic_code,
            'address' => $request->address,
            'phone' => $request->phone,
            'username' => $request->username,
            'private_key' => $request->private_key,
//            'public_key' => $request->public_key,
            'state' => $request->state,
            'city' => $request->city,
            'fax' => $request->fax,
            'insert_number' => $request->insert_number,
            'bank_account_number' => $request->bank_account_number,
            'bank_shba_number' => $request->bank_shba_number,
            'bank_name' => $request->bank_name,
            'bank_account_name' => $request->bank_account_name,
            'logo_image' => uploadFile($request->logo_image),
            'sign_image' => uploadFile($request->sign_image),
        ]);
        return back()->with('success', 'مودی با موفقیت ثبت شد.');
    }

    public function edit($id){
        $user = auth()->user();
        $taxpayer = Taxpayer::find($id);
        if ($taxpayer->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما به این مودی دسترسی ندارید');
        return view('user.moadian.edit', compact('taxpayer'));
    }

    public function update(Request $request){
        $user = auth()->user();
        $taxpayer = Taxpayer::find($request->id);
        if ($taxpayer->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما به این مودی دسترسی ندارید');
        $taxpayer->name = $request->name;
        if (hasRole(Role::ADMIN))
            $taxpayer->username = $request->username;
        $taxpayer->national_id = $request->national_id;
        $taxpayer->postal_code = $request->postal_code;
        $taxpayer->economic_code = $request->economic_code;
        $taxpayer->address = $request->address;
        $taxpayer->phone = $request->phone;
//        $taxpayer->username = $request->username;
        $taxpayer->private_key = $request->private_key;
//        $taxpayer->public_key = $request->public_key;
        $taxpayer->state = $request->state;
        $taxpayer->city = $request->city;
        $taxpayer->fax = $request->fax;
        $taxpayer->insert_number = $request->insert_number;
        $taxpayer->bank_account_number = $request->bank_account_number;
        $taxpayer->bank_shba_number = $request->bank_shba_number;
        $taxpayer->bank_name = $request->bank_name;
        $taxpayer->bank_account_name = $request->bank_account_name;
        if ($request->hasFile('logo_image'))
            $taxpayer->logo_image = uploadFile($request->logo_image);
        if ($request->hasFile('sign_image'))
            $taxpayer->logo_image = uploadFile($request->sign_image);
        $taxpayer->save();
        return back()->with('success', 'مودی با موفقیت ویرایش شد');
    }

    public function delete($id){
        $user = auth()->user();
        $taxpayer = Taxpayer::find($id);
        if ($taxpayer->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما به این مودی دسترسی ندارید');
        $taxpayer->delete();
        return back()->with('success', 'مودی با موفقیت حذف شد');
    }

    public function restore($id){
        $user = auth()->user();
        $taxpayer = Taxpayer::withTrashed()->find($id);
        if ($taxpayer->user_id != $user->id && !hasRole(Role::ADMIN))
            return back()->with('fail', 'شما به این مودی دسترسی ندارید');
        $taxpayer->restore();
        return back()->with('success', 'مودی با موفقیت بازگردانی شد');
    }

}
