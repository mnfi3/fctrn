<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\VerificationCode;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function showRegistrationForm() {
        if (!isset($_GET['mobile']) || !isset($_GET['mobile_token']))
            return redirect(route('register.mobile'));
        return view('auth.register');
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'national_code' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = request();
        $this->validate($request, [
            'captcha' => 'required|captcha'
        ]);

        $mobile = $data['mobile'];
        $token = $data['mobile_token'];
        $result = VerificationCode::validateToken($token, $mobile);
        if ($result == false) {
            return null;
        }

        $user = findDuplicateUser($data['mobile']);
        if ($user != null) {
            return $user;
        }


        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'],
            'national_code' => $data['national_code'],
            'email' => $data['email'],
            'referral_id' => isset($data['referral_id']) ? $data['referral_id'] : null,
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::where('name', '=', Role::ACCOUNTANT)->first();
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $role->id,
        ]);
        return $user;
    }
}
