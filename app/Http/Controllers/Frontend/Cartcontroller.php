<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cartcontroller extends Controller
{
    public function addtocart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if(Auth::check()){
            $prod_cheak=Product :: where ('id',$product_id)->first();
            if($prod_cheak){
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::user()->id)->exists())
                {
                    return response()->json(['status' => $prod_cheak->name.'Product already in cart']);
                }
                else{
                    $cartitem=new Cart();
                    $cartitem->prod_id = $product_id;
                    $cartitem->prod_qty = $product_qty;
                    $cartitem->user_id = Auth::id();
                    $cartitem->save();
                    return response()->json(['status' => $prod_cheak->name.'Product added']);
                }
            }

        }
        else{
            return response()->json(['status'=>'Log in to continue']);
        }
    }

    public function view_cart_item(){
        $cart_data= Cart::where ('user_id',Auth::user()->id)->get();
        return view('frontend.cartpage',compact('cart_data'));
    }




}
