<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function index(){
        return view('user.dashboard.index');
    }

    public function indexContactUs(){
        if(hasRole(Role::ADMIN)){
            $ContactUss = ContactUs::paginate(10);
            return view('manager.contactus.index', compact('ContactUss'));
        }
        else{
            return redirect()->back();
        }
    }

    public function showContactUs($id){
        if(hasRole(Role::ADMIN)) {
            $ContactUs = ContactUs::find($id);
            return view('manager.contactus.show', compact('ContactUs'));
        }
    }
}
