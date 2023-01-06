<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function order_details_view()
    {
        $order_details = Order::where ('user_id',Auth::id())->get();
        return view('frontend.order_details',compact('order_details'));
    }
    
    public function view_order_item($id)
    {
        $order_view = Order::where ('id',$id)->where ('user_id',Auth::id())->first();
        return view('frontend.view_order',compact('order_view'));
    }

    // public function pay_go(){
    //     return view('exampleEasycheakout');
    // } 
}
