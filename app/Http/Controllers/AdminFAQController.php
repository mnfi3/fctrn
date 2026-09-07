<?php

namespace App\Http\Controllers;



use App\Models\FAQ;
use App\Models\Hfaq;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AdminFAQController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }
    public function index($id){

        if(hasRole(Role::ADMIN)){
            $FAQs = FAQ::where('header_id',$id)->paginate(10);
            return view('manager.faq.index', compact('FAQs'));
        }
        else{
            return redirect()->back();
        }

    }

    public function create()
    {
        if(hasRole(Role::ADMIN)){
        $HFAQs = Hfaq::all();
        return view('manager.faq.create', compact('HFAQs'));
        }
    }

    public function Store(Request $request)
    {

        if(hasRole(Role::ADMIN)){

        $faq = new FAQ([
            'header_id' => $request->input('header_id'),
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'user_id' => Auth::user()->id
        ]);
        $faq->save();
        return redirect()->route('HFAQ.indexH')->with("success", "فرم ارسالی با موفقیت ثبت شد.");
        }
    }

    public function edit($id)
    {
        if(hasRole(Role::ADMIN)) {
            $FAQ = FAQ::find($id);
            $HFAQs = Hfaq::all();
            return view('manager.faq.edit', compact('FAQ','HFAQs'));
        }
    }

    public function update(Request $request)
    {
        if(hasRole(Role::ADMIN)){
            $faq = FAQ::find($request->id);
            $faq->update([
                'header_id' => $request->input('header_id'),
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('HFAQ.indexH')->with("success", "فرم ارسالی با موفقیت بروزرسانی شد.");
        }
    }

    public function delete($id)
    {
        if(hasRole(Role::ADMIN)) {
            $FAQ = FAQ::find($id);
            $FAQ->delete();
            return redirect()->route('HFAQ.indexH')->with("success", "ردیف ارسالی با موفقیت حذف شد.");
        }
    }

    public function indexH(){

        if(hasRole(Role::ADMIN)){
            $HFAQs = Hfaq::paginate(10);
            return view('manager.faq.indexH', compact('HFAQs'));
        }
        else{
            return redirect()->back();
        }

    }
    public function createH()
    {
        if(hasRole(Role::ADMIN)){
            return view('manager.faq.createH');
        }
    }

    public function StoreH(Request $request)
    {
        if(hasRole(Role::ADMIN)){
            $faq = new Hfaq([
                'title' => $request->input('title'),
                'user_id' => Auth::user()->id
            ]);

            $faq->save();
            return redirect()->route('HFAQ.indexH')->with("success", "فرم ارسالی با موفقیت ثبت شد.");
        }
    }

    public function editH($id)
    {
        if(hasRole(Role::ADMIN)) {
            $HFAQ = Hfaq::find($id);
            return view('manager.faq.editH', compact('HFAQ'));
        }
    }

    public function updateH(Request $request)
    {
        if(hasRole(Role::ADMIN)){
            $faq = Hfaq::find($request->id);
            $faq->update([
                'title' => $request->input('title'),
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('HFAQ.indexH')->with("success", "فرم ارسالی با موفقیت بروزرسانی شد.");
        }
    }
}
