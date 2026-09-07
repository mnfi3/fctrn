<?php

namespace App\Http\Controllers;

use App\Models\InfinitePackage;
use App\Models\PublicPackage;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function infiniteIndex(){
        $packages = InfinitePackage::all();
        return view('manager.package.infinite_index', compact('packages'));
    }

    public function publicIndex(){
        $packages = PublicPackage::all();
        return view('manager.package.public_index', compact('packages'));
    }

    public function insert(Request $request){
        $type = $request->type;
        if ($type == 'infinite'){
            $package = InfinitePackage::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'cost' => $request->cost,
                'day_count' => $request->day_count,
            ]);
        }else{
            $package = PublicPackage::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'cost' => $request->cost,
                'invoice_count' => $request->invoice_count,
            ]);
        }

        return back()->with('success', 'بسته جدید با موفقیت ثبت شد.');
    }

    public function delete($type, $id){
        if ($type == 'infinte'){
            $package = InfinitePackage::find($id);
            $package->delete();
        }else{
            $package = PublicPackage::find($id);
            $package->delete();
        }
        return back()->with('success', 'بسته با موفقیت حذف شد.');
    }
}
