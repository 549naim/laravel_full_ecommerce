<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Categorycontroller extends Controller
{
    public function categoryview(){
        $category = Category::all();
        return view('admin/categoryview',compact("category"));
    }

    public function insertProduct(Request $request){
      $data= new Category;
      $image=$request->image;
      $imageName=time(). '.'.$image->getClientOriginalExtension();
      $request->image->move('category_image',$imageName);
      $data->image=$imageName; 
      
      $data->name=$request->name;
      $data->slug=$request->slug;
      $data->description=$request->description;
      $data->status=$request->status==TRUE ?'1':'0';
      $data->populer=$request->populer==TRUE ?'1':'0';
      $data->meta_title=$request->meta_title;
      $data->meta_descrip=$request->meta_descrip;
      $data->meta_keywords=$request->meta_keywords;

      $data->save();
      return redirect('/categorypage');



    }

    public function editCategory($id){
       $category = Category::find($id);
       return view("admin/editcategoryform",compact('category'));
    }

    public function updateCategory(Request $request,$id){
        $data=Category::find($id);
        if($request->hasFile('image')){
          $path='category_image/'.$data->image;
          if(File::exists($path)) {
              File::delete($path);
          }
          $image=$request->image;
          if($image){
            $imageName=time(). '.'.$image->getClientOriginalExtension();
            $request->image->move('category_image',$imageName);
            $data->image=$imageName;
          }
        }
      $data->name=$request->name;
      $data->slug=$request->slug;
      $data->description=$request->description;
      $data->status=$request->status==TRUE ?'1':'0';
      $data->populer=$request->populer==TRUE ?'1':'0';
      $data->meta_title=$request->meta_title;
      $data->meta_descrip=$request->meta_descrip;
      $data->meta_keywords=$request->meta_keywords;

      $data->save();
      return redirect('/categorypage');
    
      }


      public function deletecategory($id){
        $data=Category::find($id);
        if($data->image){
            $path='category_image/'.$data->image;
            if(File::exists($path)) {
                File::delete($path);
            }
        }
        $data->delete();
        return redirect('/categorypage');
    }


}
