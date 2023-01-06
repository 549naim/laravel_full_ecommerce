<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_items;
use App\Models\Product;
use App\Models\User;
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
        $cart_product_list=Cart::where ('user_id',Auth::user()->id)->count();
        return view('frontend.cartpage',compact('cart_data','cart_product_list'));
    }

    public function delete_from_cart(Request $request) {
        $product_id = $request->input('id');
        $data= Cart::find($product_id);
        $data->delete();
        return response()->json(['status' =>'Product Deleted']);
    }

    public function edit_quantity(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $product_qty = $request->input('product_qty');
        $cartitem=Cart::find($cart_id);
        $cartitem->prod_qty = $product_qty;
        $cartitem->update();
        return response()->json(['status' =>'quantity changed']);
        //         }

        // if(Auth::check()){
        //     $prod_cheak=Cart :: where ('id',$cart_id)->first();

        //     if($prod_cheak){
        //         if(Cart::where('id',$cart_id)->where('user_id',Auth::user()->id)->exists())
        //         {
        //             $cartitem=Cart::where('id',$cart_id)->where('user_id',Auth::user()->id)->get();                  
        //             $cartitem->prod_qty = $product_qty;
        //             $cartitem->update(); 
        //         }
        //         else{
        //             return response()->json(['status' => $prod_cheak->name.'Product  Not found']);
        //         }
        //     }

        // }
        // else{
        //     return response()->json(['status'=>'Log in to continue']);
        // }
    }

    public function cheakout(){
        $old_cart_data= Cart::where ('user_id',Auth::id())->get();
        // foreach($old_cart_data as $item)
        // {
        //     if(!Product::where('id',$item->prod_id)->where('quantity','>=',$item->prod_qty)->exists())
        //     {
        //         $removeitem =Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
        //         $removeitem->delete();
        //     }
        // }
        
        $cart_data= Cart::where ('user_id',Auth::id())->get();
        return view('frontend.cheakout',compact('cart_data'));
    }

    public function placeorder(Request $request){
        $cart_data= Cart::where ('user_id',Auth::id())->get();
        $order=new Order();
        $order->name=$request->input('name');
        $order->user_id=Auth::id();
        $order->address=$request->input('address');
        $order->email=$request->input('email');
        $order->phone_number=$request->input('phone_number');
        $order->city=$request->input('city');
        $order->state=$request->input('state');
        $order->country=$request->input('country');
        $order->postalcode=$request->input('postalcode');
        $order->traking_num='e_com'.rand(1,5000000);
        $total=0;
        $cart_total=Cart::where('user_id',Auth::id())->get();
        foreach ($cart_total as $item)
        {
            $total += $item->cartproduct->selling_price * $item->prod_qty;
        }
        $order->total = $total;
        $order->save();

      
        $cart_data= Cart::where ('user_id',Auth::id())->get();
        foreach($cart_data as $item){
            Order_items::create([
                 'order_id' =>$order->id,
                 'prod_id' =>$item->prod_id,
                 'qty' =>$item->prod_qty,
                 'price' =>$item->cartproduct->selling_price,
            ]);
            $product= Product::where('id',$item->prod_id)->first();
            $product->quantity=$product->quantity - $item->prod_qty;
            $product->update();
        }

        if(Auth::user()->address == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name=$request->input('name');
            $user->address=$request->input('address');
            $user->p_number=$request->input('phone_number');
            $user->city=$request->input('city');
            $user->state=$request->input('state');
            $user->country=$request->input('country');
            $user->postalcode=$request->input('postalcode');
            $user->update();
        }
        $cart_data= Cart::where ('user_id',Auth::id())->get();
        Cart::destroy($cart_data);

        return redirect('/')->with('status',"order placed successfully !!!");
    }

}
