<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Productcontroller extends Controller
{
    public function showallProducts()
    {
        $category = Category::all();
        $products = product::all();
        return view('admin.product.showallproducts', compact('category', 'products'));
    }

    public function inserProduct(Request $request)
    {

        $data = new Product;
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product_image', $imageName);
        $data->image = $imageName;

        $data->name = $request->name;
        $data->cate_id = $request->cate_id;
        $data->description = $request->description;
        $data->status = $request->status == TRUE ? '1' : '0';
        $data->trending = $request->trending == TRUE ? '1' : '0';
        $data->meta_title = $request->meta_title;
        $data->meta_desc = $request->meta_desc;
        $data->meta_keywords = $request->meta_keywords;
        $data->small_desc = $request->small_desc;
        $data->orginal_price = $request->orginal_price;
        $data->selling_price = $request->selling_price;
        $data->quantity = $request->quantity;
        $data->tax = $request->tax;

        $data->save();
        return redirect('/showallproducts')->with('status', 'Product added successfully');
    }

    public function deleteproduct($id)
    {
        $data = Product::find($id);
        if ($data->image) {
            $path = 'product_image/' . $data->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $data->delete();
        return redirect('/showallproducts');
    }





    public function editproduct($id)
    {    
        $category = Category::all();
        $product = Product::find($id);
        return view("admin.product.editproductpage", compact('product','category'));
    }

    public function updateProduct(Request $request, $id)
    {
        $data = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'product_image/' . $data->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $image = $request->image;
            if ($image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('product_image', $imageName);
                $data->image = $imageName;
            }
        }
        $data->name = $request->name;
        // $data->cate_id = $request->cate_id;
        $data->description = $request->description;
        $data->status = $request->status == TRUE ? '1' : '0';
        $data->trending = $request->trending == TRUE ? '1' : '0';
        $data->meta_title = $request->meta_title;
        $data->meta_desc = $request->meta_desc;
        $data->meta_keywords = $request->meta_keywords;
        $data->small_desc = $request->small_desc;
        $data->orginal_price = $request->orginal_price;
        $data->selling_price = $request->selling_price;
        $data->quantity = $request->quantity;
        $data->p_q = $request->p_q;       
        $data->tax = $request->tax;
        $data->save();
        return redirect('/showallproducts');
    }

    public function allorders() {
        $orders=Order::where ('status','0')->get();
        return view('admin.allorders',compact('orders'));
    }

    public function allordershistory() {
        $orders=Order::where ('status','1')->get();
      
        return view('admin.allordershistory',compact('orders'));
    }

    public function allusers() {
        $user=User::all();
        return view('admin.allusers', compact('user'));
    }

    public function view_order_admin($id)
    {
        $order_view = Order::where ('id',$id)->first();
        return view('admin.view_order_admin',compact('order_view'));
    }
    public function update_product_status(Request $request, $id){
       $order_status = Order::find($id);
       $order_status->status = $request->input('status');
       $order_status->update();
       return redirect('/all_orders');
    }

    public function userDetails($id){
       $user=User::find($id);
      
       return view('admin.user_details_from_admin',compact('user'));
    }
}
