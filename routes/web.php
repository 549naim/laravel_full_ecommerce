<?php

use App\Http\Controllers\Admin\Categorycontroller;
use App\Http\Controllers\Admin\Productcontroller;
use App\Http\Controllers\Frontend\Cartcontroller;
use App\Http\Controllers\Frontend\Frontendcontroller;
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
Route::get('/',[Frontendcontroller::class,'homeindex']);
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
});