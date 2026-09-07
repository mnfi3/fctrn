<?php

namespace App\Http\Controllers\Moadian;

use App\Http\Controllers\Controller;
use App\Models\Moadian\Product;
use App\Models\Moadian\UserProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function index(Request $request){
        $taxTpStoPartCode = $request->taxTpStoPartCode;
        $descriptionOfId = $request->descriptionOfId;
        $products = Product::orderBy('id', 'desc');
        if (strlen($taxTpStoPartCode) > 0)
            $products = $products->where('taxTpStoPartCode', 'like', '%'.$taxTpStoPartCode.'%');
        if (strlen($descriptionOfId) > 0)
            $products = $products->where('descriptionOfId', 'like', '%'.$descriptionOfId.'%');

        $products = $products->paginate(100);
        $user_products = Product::whereIn('id', UserProduct::getUserProductIds())->pluck('taxTpStoPartCode')->toArray();


        return view('user.product.index', compact('products', 'user_products', 'taxTpStoPartCode', 'descriptionOfId'));
    }

    public function create(){
        $products = UserProduct::getUserProducts(100);
        return view('user.product.create', compact('products'));
    }

    public function insert(Request $request){
        $user = auth()->user();
        $specialOrGeneral = (is_null($request->specialOrGeneral)) ? '' : 1;
        $taxTpStoPartCode = toNumber(toEnglishNumbers($request->taxTpStoPartCode));
        $vat = toFloatNumber($request->vat);
        $descriptionOfId = $request->descriptionOfId;
        $p = Product::where('taxTpStoPartCode', '=', $taxTpStoPartCode)->first();
        /*if ($p != null) {
            UserProduct::addToUserProduct($p->id);
            return back()->with('success', 'شناسه با موفقیت ثبت شد');
        }*/

        $p = Product::create([
            'user_id' => $user->id,
            'taxTpStoPartCode' => $taxTpStoPartCode,
            'specialOrGeneral' => $specialOrGeneral,
            'vat' => $vat,
            'descriptionOfId' => $descriptionOfId,
        ]);
        UserProduct::addToUserProduct($p->id);
        return back()->with('success', 'شناسه با موفقیت ثبت شد');
    }

    public function addToList($id){
        $product = Product::find($id);
        $user = auth()->user();
        UserProduct::addToUserProduct($product->id);
        return back()->with('success', 'شناسه با موفقیت به لیست شناسه های شما اضافه شد');
    }
}
