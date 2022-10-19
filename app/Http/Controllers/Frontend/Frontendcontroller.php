<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Frontendcontroller extends Controller
{
    public function homeindex() {
        $product= Product::where('trending','1')->get();
        
        return view('frontend.index',compact('product'));
    }

    public function allcategoryitems(){
        $trending_category= Category::where('populer','1')->get();
        $category= Category::all();
        return view('frontend.allcategoryitems',compact('category','trending_category'));
    }

    public function view_category_product($id){
        if (Category::find($id)->exists()){
            $c_product=Product::where('cate_id',$id)->get();
            return view('frontend.cate_details_product',compact('c_product'));
        }
        else {
            return redirect('/')->with('status',"Category product not found");
        }
    }
    public function view_product_details($id){
        $data = Product::find($id);
        return view('frontend/product_details_page',compact('data'));
    }



}
