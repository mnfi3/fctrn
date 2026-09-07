<?php

namespace App\Http\Controllers;

use App\Models\InfinitePackage;
use App\Models\PublicPackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function infiniteInfo($id){
        $package = InfinitePackage::find($id);
        return responseJson(1, $package);
    }

    public function publicInfo($id){
        $package = PublicPackage::find($id);
        return responseJson(1, $package);
    }
}
