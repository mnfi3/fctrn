<?php

namespace App\Http\Controllers;

use App\Models\Hfaq;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class SubLandingController extends Controller
{
    //
    public function index(){
        $LatestPostTutorial = Post::where('status',1)->where('category','آموزش')->latest()->first();
        $LatestPostNew = Post::where('status',1)->where('category','اخبار')->latest()->first();
        $LatestPostBlog = Post::where('status',1)->where('category','بلاگ')->latest()->first();
        $LatestPostUpdate= Post::where('status',1)->where('category','بروزرسانی')->latest()->first();
        $Posts = Post::orderBy('created_at', 'desc')->paginate(6);
        $description = 'صفر تا صد سامانه مودیان را خودتان انجام دهید. ارسال آسان اطلاعات از فاکتورین به فاکتورین مودیان. همراه با آموزش  حرفه ای و پشتیبانی تمام وقت. ثبت نام رایگان ارسال فاکتور رایگان';
        $keywords = 'سامانه مودیان , فاکتورین , نرم افزار واسط , ارسال صورتحساب الکترونیکی';
        return view('blog',compact('Posts','LatestPostTutorial','LatestPostNew',
            'LatestPostBlog','LatestPostUpdate','keywords','description'));
    }


    public function ctegoricalindex(Request $request)
    {
        $category = $request->input('category');

        $Posts = Post::where('status', 1)->when($category && $category !== 'همه', function ($query) use ($category) {
            return $query->where('category', $category);
        })
            ->orderBy('created_at', 'desc')->paginate(6);
        $description = 'صفر تا صد سامانه مودیان را خودتان انجام دهید. ارسال آسان اطلاعات از فاکتورین به فاکتورین مودیان. همراه با آموزش  حرفه ای و پشتیبانی تمام وقت. ثبت نام رایگان ارسال فاکتور رایگان';
        $keywords = 'سامانه مودیان , فاکتورین , نرم افزار واسط , ارسال صورتحساب الکترونیکی';
        return view('blog', compact('Posts','keywords','description'));
    }

    public function show($slug)
    {
        $LatestPostTutorial = Post::where('status',1)->where('category','آموزش')->get();
        $LatestPostNew = Post::where('status',1)->where('category','اخبار')->get();
        $LatestPostBlog = Post::where('status',1)->where('category','بلاگ')->get();
        $LatestPostUpdate= Post::where('status',1)->where('category','بروزرسانی')->get();
        $Posts = Post::latest()->take(5)->get();
        $Post = Post::where('slug',$slug)->first();
        $FooterPosts = Post::paginate(3);
        $description = $Post->meta_description;
        $keywords = $Post->meta_keywords;
        return view('post',compact('FooterPosts','Post','Posts','LatestPostTutorial','LatestPostNew',
            'LatestPostBlog','LatestPostUpdate','keywords','description'));
    }

    public function indexFAQ(){
        $HFAQs = Hfaq::paginate(10);
        $LatestPostTutorial = Post::where('status',1)->where('category','آموزش')->get();
        $LatestPostNew = Post::where('status',1)->where('category','اخبار')->get();
        $LatestPostBlog = Post::where('status',1)->where('category','بلاگ')->get();
        $LatestPostUpdate= Post::where('status',1)->where('category','بروزرسانی')->get();
        $Posts = Post::latest()->take(5)->get();
        $description = 'صفر تا صد سامانه مودیان را خودتان انجام دهید. ارسال آسان اطلاعات از فاکتورین به فاکتورین مودیان. همراه با آموزش  حرفه ای و پشتیبانی تمام وقت. ثبت نام رایگان ارسال فاکتور رایگان';
        $keywords = 'سامانه مودیان , فاکتورین , نرم افزار واسط , ارسال صورتحساب الکترونیکی';
        return view('faq',compact('HFAQs','Posts','LatestPostTutorial','LatestPostNew',
            'LatestPostBlog','LatestPostUpdate','keywords','description'));
    }

    public function indexAboutUs(){

    }

    public function indexRules(){
        $description = 'صفر تا صد سامانه مودیان را خودتان انجام دهید. ارسال آسان اطلاعات از فاکتورین به فاکتورین مودیان. همراه با آموزش  حرفه ای و پشتیبانی تمام وقت. ثبت نام رایگان ارسال فاکتور رایگان';
        $keywords = 'سامانه مودیان , فاکتورین , فاکتورین , نرم افزار واسط , ارسال صورتحساب الکترونیکی';
        return view('rules', compact('description', 'keywords'));
    }
}
