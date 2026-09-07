<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\InfinitePackage;
use App\Models\Post;
use App\Models\PublicPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    //
    public function index(){
                $description = 'صفر تا صد سامانه مودیان را خودتان انجام دهید. ارسال آسان اطلاعات از فاکتورین به فاکتورین مودیان. همراه با آموزش  حرفه ای و پشتیبانی تمام وقت. ثبت نام رایگان ارسال فاکتور رایگان';
        $keywords = 'سامانه مودیان , فاکتورین , نرم افزار واسط , ارسال صورتحساب الکترونیکی';
        $infinite_packages = InfinitePackage::all();
        $public_packages = PublicPackage::all();
        $LatestPost1 = Post::where('status',1)->orderBy('created_at', 'desc')->take(3)->get();
        $LatestPost2 = Post::where('status',1)->orderBy('created_at', 'desc')->skip(3)->take(3)->get();
        return view('main',compact('keywords','description','infinite_packages','public_packages','LatestPost1','LatestPost2'));
    }

    public function storeContactForm(Request $request){

        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'title' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
            'captcha' => 'required|captcha'
        ]);

        // Handle validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


         ContactUs::create([
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'title' => $request->input('title'),
             'number' => $request->input('number'),
             'message' => $request->input('message'),
         ]);


        // Redirect with a success message
        return redirect()->route('index','#contactus')->with('status', 'پیام شما با موفقیت ارسالی شد. در اسرع وقت، همکاران ما با شما در ارتباط خواهند بود.');
    }
}
