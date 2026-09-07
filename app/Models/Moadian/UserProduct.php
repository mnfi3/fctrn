<?php

namespace App\Models\Moadian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_ids',
    ];

    public static function getUserProducts($paginate = 0, $user = null){
        $user = (is_null($user)) ? auth()->user() : $user;
        $u_p = UserProduct::orderBy('id', 'desc')->where('user_id', '=', $user->id)->first();
        if (is_null($u_p)){
            $u_p = UserProduct::create([
                'user_id' => $user->id,
                'product_ids' => json_encode([]),
            ]);
            return [];
        }else{
            try {
                $p_ids = json_decode($u_p->product_ids);
                $p_ids = (is_array($p_ids)) ? $p_ids : [];
                if ($paginate == 0)
                    $products = Product::orderBy('id', 'desc')->whereIn('id', $p_ids)->get();
                else
                    $products = Product::orderBy('id', 'desc')->whereIn('id', $p_ids)->paginate($paginate);
                return $products;
            }catch (\Exception $e){
                return [];
            }
        }
    }

    public static function getUserProductIds(){
        $user = auth()->user();
        $u_p = UserProduct::orderBy('id', 'desc')->where('user_id', '=', $user->id)->first();
        if (is_null($u_p)){
            $u_p = UserProduct::create([
                'user_id' => $user->id,
                'product_ids' => json_encode([]),
            ]);
            return [];
        }else{
            try {
                $p_ids = json_decode($u_p->product_ids);
               return (is_array($p_ids)) ? $p_ids : [];
            }catch (\Exception $e){
                return [];
            }
        }
    }

    public static function addToUserProduct($product_id){
        $user = auth()->user();
        $u_p = UserProduct::orderBy('id', 'desc')->where('user_id', '=', $user->id)->first();
        if (is_null($u_p)){
            $u_p = UserProduct::create([
                'user_id' => $user->id,
                'product_ids' => json_encode([$product_id]),
            ]);
        }else{
            try {
                $p_ids = json_decode($u_p->product_ids);
                $p_ids = (is_array($p_ids)) ? $p_ids : [];
                if(!in_array($product_id, $p_ids)) $p_ids[] = $product_id;
                $u_p->product_ids = json_encode($p_ids);
                $u_p->save();
            }catch (\Exception $e){
//                dd($e->getMessage());
            }
        }
    }
}
