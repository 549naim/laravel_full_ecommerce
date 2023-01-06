<?php

use App\Http\Controllers\Admin\Categorycontroller;
use App\Http\Controllers\Admin\Productcontroller;
use App\Http\Controllers\Frontend\Cartcontroller;
use App\Http\Controllers\Frontend\Frontendcontroller;
use App\Http\Controllers\HomeController;
 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('homeindex');
// });

Auth::routes();
Route::get('/',[Frontendcontroller::class,'mainhome']);
Route::get('/all_product_item',[Frontendcontroller::class,'all_product_item']);
Route::get('/homeindex',[Frontendcontroller::class,'homeindex']);
Route::get('/allcategoryitems',[Frontendcontroller::class,'allcategoryitems']);
Route::get('/view_category_product/{id}',[Frontendcontroller::class,'view_category_product']);
Route::get('/view_product_details/{id}/{name}',[Frontendcontroller::class,'view_product_details']);

// Route::get('/', [Frontendcontroller::class, 'homeindex'])->name('home');
Route::post('/add-to-cart',[Cartcontroller::class,'addtocart']) ;
Route::middleware(['auth'])->group(function(){
    Route::get('/view_cart_item',[Cartcontroller::class,'view_cart_item']) ;
    Route::post('/delete_from_cart',[Cartcontroller::class,'delete_from_cart']) ;
    Route::post('/edit_quantity',[Cartcontroller::class,'edit_quantity']) ;
    Route::get('/cheakout',[Cartcontroller::class,'cheakout']) ;
    Route::post('/place_order',[Cartcontroller::class,'placeorder']) ;
    Route::get('/order_details_view',[HomeController::class,'order_details_view']) ;
    Route::get('/view_order_item/{id}',[HomeController::class,'view_order_item']) ;
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.admindashboard');
     });
    Route::get('/categorypage',[Categorycontroller::class,'categoryview']) ;
    Route::post('/insert_product',[Categorycontroller::class,'insertProduct']);
    Route::get('/edit_category/{id}',[Categorycontroller::class,'editCategory']);
    Route::post('/update_category/{id}',[Categorycontroller::class,'updateCategory']);
    Route::get('/delete_category/{id}',[Categorycontroller::class,'deletecategory']);

    Route::get('/showallproducts',[ProductController::class,'showallProducts']);
    Route::post('/insert_allproduct',[ProductController::class,'inserProduct']);
    Route::get('/delete_product/{id}',[ProductController::class,'deleteproduct']);
    Route::get('/edit_product/{id}',[ProductController::class,'editproduct']);
    Route::post('/upload_allproduct/{id}',[ProductController::class,'updateProduct']);
    Route::get('/all_orders',[ProductController::class,'allorders']);
    Route::get('/all_orders_history',[ProductController::class,'allordershistory']);
    Route::get('/all_users',[ProductController::class,'allusers']);
    Route::get('/view_order_admin/{id}',[ProductController::class,'view_order_admin']) ;
    Route::post('/update_product_status/{id}',[ProductController::class,'update_product_status']) ;

    Route::get('/user_details_from_admin/{id}',[ProductController::class,'userDetails']);
   
    


});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

//SSLCOMMERZ END

 Route::get('/payment_go', function () {
     return view('exampleEasycheckout');
 });