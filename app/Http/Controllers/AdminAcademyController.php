<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use Illuminate\Http\Request;

class AdminAcademyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function index(){
        $academies = Academy::all();
        return view('manager.academy.index', compact('academies'));
    }

    public function insert(Request $request){
        $academy = Academy::create([
            'user_id' => auth()->user()->id,
            'number' => $request->number,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'video_path' => $request->video_path,
            'aparat_embeded' => $request->aparat_embeded,
            'description' => $request->description,
            'show_count' => $request->show_count,
        ]);
        return back()->with('success', 'اموزش با موفقیت ایجاد شد');
    }

    public function delete(Request $request){
        $academy = Academy::find($request->id);
        $academy->delete();
        return back()->with('success', 'آموزش با موفقیت حذف شد');
    }

    public function update(Request $request){
        $academy = Academy::find($request->id);
        $academy->number = $request->number;
        $academy->title = $request->title;
        $academy->short_description = $request->short_description;
        $academy->video_path = $request->video_path;
        $academy->aparat_embeded = $request->aparat_embeded;
        $academy->description = $request->description;
        $academy->show_count = $request->show_count;
        $academy->save();
        return back()->with('success', 'آموزش با موفقیت ویرایش شد.');
    }
}
