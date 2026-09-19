<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function index(){
        $academies = Academy::orderBy('number', 'asc')->get();
        $description = 'آموزش های فاکتورین';
        $keywords = 'سامانه مودیان , فاکتورین , نرم افزار مالیاتی , ارسال صورتحساب الکترونیکی , آموزش ثبت نام مودیان';
        return view('academy', compact('academies', 'keywords','description'));
    }

    public function item($id, $title){
        $academy = Academy::find($id);
        $academy->show_count = $academy->show_count + 1;
        $academy->save();
        $description = $academy->title;
        $keywords = 'آموزش سامانه مودیان , فاکتورین , نرم افزار مالیاتی , ارسال صورتحساب الکترونیکی';
        return view('academy-show', compact('academy', 'keywords','description'));
    }
}
