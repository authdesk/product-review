<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductImage\StoreRequest;
use App\Http\Requests\Admin\ProductImage\UpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Auth;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductImage::get()->groupBy('product_name');

        return view('admin.product_image.all', compact('products'));
        
    }


    public function product_images($product_name)
    {
        $product_images = ProductImage::where('product_name', $product_name)->get();

        return view('admin.product_image.product_images', compact('product_images','product_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        
        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {

            $product_images=$request->file('product_image');

            //multi images upload
            foreach ($product_images as $image) {
                //image url set
                $image_name=Str::random(20);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='backend_image/product_image/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

            
                //insert data
                $data = [];
                $data['product_name'] = $request->product_name;
                $data['product_image'] = $image_url;
                $data['status'] = $request->status;

                $insert = ProductImage::create($data);

            }
    
            Toastr::success('Image inserted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.product-image.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function show(ProductColor $productColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = ProductImage::findOrFail($id);

        return view('admin.product_image.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {

       

        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {
            
            
            $image=$request->file('product_image');


                //update for image
                if ($image) {
        
                    //image url set
                    $image_name=Str::random(20);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='backend_image/product_image/product_image/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);

                    //remove old image
                    $old_image = ProductImage::findOrFail($id);
                    $old_image_path = $old_image->product_image;
                    if ($old_image_path) {
                        $delete_old_image = unlink($old_image_path);
                    }
                    

                    //update data
                    $data = $request->all();
                    $data['product_image']=$image_url;
                    $update_with_image = ProductImage::findOrFail($id)->update($data);

                    if ($update_with_image) {
                        Toastr::success('product_images data updated successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.product-image.index');
                    }else {
                        Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                
            

             
            //update without image
            } else {

               $data = $request->all();
               $update_without_image1 = ProductImage::findOrFail($id)->update($data);

               if ($update_without_image1) {
                    Toastr::success('updated without image!', 'Message', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.product-image.index');
                }else {
                    Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                    return back();
                }

            }

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);
        $photo = $image->product_image;

        if ($photo) {
            unlink($photo);
        }


        ProductImage::findOrFail($id)->delete();
        Toastr::success('Image data deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.product-image.index');
    
    }


    public function active_product_image($id)
    {
        ProductImage::findOrFail($id)->update(['status' => 1]);
        Toastr::success('Product image actived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.product-image.index');
    }


    public function inactive_product_image($id)
    {
        ProductImage::findOrFail($id)->update(['status' => 0]);
        Toastr::success('Product image deactived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.product-image.index');
    }
}
