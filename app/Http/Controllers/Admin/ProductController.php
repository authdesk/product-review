<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use Illuminate\Support\Str;
use Validator;
use Flash;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product.all', compact('products') );
    }


    public function create()
    {
        return view('admin.product.create');
    }


    public function store(StoreRequest $request)
    {

        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {

            $image=$request->file('product_image');

            //image url set
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='backend_image/product_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
         
            //insert data
            $data = $request->all();
            $data['product_image'] = $image_url;
            $insert = Product::create($data);

            if ($insert) {
                Toastr::success('Product data inserted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.product.index');
            }else {
               Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
    }


    public function active_product($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        Toastr::success('Product actived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.product.index');
    }


    public function inactive_product($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        Toastr::success('Product deactived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.product.index');
    }


    public function show($id)
    {
        $product = Product::findOrFail( $id);
        return view('admin.product.view', compact('product'));  
    }


    public function edit($id)
    {
        $edit = Product::findOrFail($id);
        return view('admin.product.edit', compact('edit'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {
            
            $image=$request->file('product_image');
            
            //update with image
            if ($image) {
    
                //image url set
                $image_name=Str::random(20);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='backend_image/product_image/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

                //remove old image
                $old_image = Product::findOrFail($id);
                $old_image_path = $old_image->product_image;

                if ($old_image_path) {
                    $delete_old_image = unlink($old_image_path);
                }

                //update data
                $data = $request->all();
                $data['product_image']=$image_url;
                $update_with_image = Product::findOrFail($id)->update($data);

                if ($update_with_image) {
                    Toastr::success('Product data updated successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.product.index');
                }else {
                    Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                    return back();
                }
             
            //update without image
            } else {

               $data = $request->all();
               $update_without_image = Product::findOrFail($id)->update($data);

               if ($update_without_image) {
                    Toastr::success('Updated without image!', 'Message', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.product.index');
                }else {
                    Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                    return back();
                }

            }

        }
    }


    public function destroy($id)
    {
        $image = Product::findOrFail($id);
        $photo = $image->product_image;

        if ($photo) {
            unlink($photo);
            Product::findOrFail($id)->delete();
            Toastr::success('Product Data deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.product.index');
        }else {
            Product::findOrFail($id)->delete();
            Toastr::success('Image deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.product.index');
        }
    
    }
    
    
}
