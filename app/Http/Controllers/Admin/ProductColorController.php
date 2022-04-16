<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\Admin\ProductColor\StoreRequest;
use App\Http\Requests\Admin\ProductColor\UpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Auth;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductColor::get()->groupBy('product_name');

        return view('admin.product_color.all', compact('products'));
        
    }



    public function product_colors($product_name)
    {
        $product_colors = ProductColor::where('product_name', $product_name)->get();

        return view('admin.product_color.product_colors', compact('product_colors'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_color.create');
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

            $colors=$request->addmore;

            //multi images upload
            foreach ($colors as $color) {
                //image url set
                $image = $color['color_image'];
                $image_name=Str::random(20);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='backend_image/color_image/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

                //image1 url set
                $image1 = $color['product_image'];
                $image_name1=Str::random(20);
                $ext1=strtolower($image1->getClientOriginalExtension());
                $image_full_name1=$image_name1.".".$ext1;
                $upload_path1='backend_image/color_image/product_image/';
                $image_url1=$upload_path1.$image_full_name1;
                $success1=$image1->move($upload_path1,$image_full_name1);
            
                //insert data
                $data = [];
                $data['product_name'] = $request->product_name;
                $data['product_color'] = $color['product_color'];
                $data['color_image'] = $image_url;
                $data['product_image'] = $image_url1;
                $data['status'] = $request->status;

                $insert = ProductColor::create($data);

            }
    
            Toastr::success('Color inserted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.product-color.index');

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
        $edit = ProductColor::findOrFail($id);

        return view('admin.product_color.edit', compact('edit'));
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
            
            
            $image=$request->file('color_image');
            $image1=$request->file('product_image');

            if ($image or $image1) {

                //update for image
                if ($image) {
        
                    //image url set
                    $image_name=Str::random(20);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='backend_image/color_image/product_image/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);

                    //remove old image
                    $old_image = ProductColor::findOrFail($id);
                    $old_image_path = $old_image->color_image;
                    if ($old_image_path) {
                        $delete_old_image = unlink($old_image_path);
                    }
                    

                    //update data
                    $data = $request->all();
                    $data['color_image']=$image_url;
                    $update_with_image = ProductColor::findOrFail($id)->update($data);

                    if ($update_with_image) {
                        Toastr::success('Colors data updated successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.product-color.index');
                    }else {
                        Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                
                
                } 

                 //update for image 1
                if ($image1) {
        
                    //image url set
                    $image_name1=Str::random(20);
                    $ext1=strtolower($image1->getClientOriginalExtension());
                    $image_full_name1=$image_name1.".".$ext1;
                    $upload_path1='backend_image/color_image/product_image/';
                    $image_url1=$upload_path1.$image_full_name1;
                    $success1=$image1->move($upload_path1,$image_full_name1);

                    //remove old image
                    $old_image1 = ProductColor::findOrFail($id);
                    $old_image_path1 = $old_image1->product_image;
                    if ( $old_image_path1) {
                        $delete_old_image1 = unlink($old_image_path1);
                    }
                    

                    //update data
                    $data = $request->all();
                    $data['product_image']=$image_url1;
                    $update_with_image1 = ProductColor::findOrFail($id)->update($data);

                    if ($update_with_image1) {
                        Toastr::success('Colors data updated successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.product-color.index');
                    }else {
                        Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                }
            
            
            


           
             
            //update without image
            } else {

               $data = $request->all();
               $update_without_image1 = ProductColor::findOrFail($id)->update($data);

               if ($update_without_image1) {
                    Toastr::success('updated without image!', 'Message', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.product-color.index');
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
        $image = ProductColor::findOrFail($id);
        $photo = $image->color_image;
        $photo1 = $image->product_image;

        if ($photo) {
            unlink($photo);
        }
        
        if ($photo1) {
            unlink($photo1);
        }

        ProductColor::findOrFail($id)->delete();
        Toastr::success('Color data deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.product-color.index');
    
    }


    public function active_product_color($id)
    {
        ProductColor::findOrFail($id)->update(['status' => 1]);
        Toastr::success('Product color actived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.product-color.index');
    }


    public function inactive_product_color($id)
    {
        ProductColor::findOrFail($id)->update(['status' => 0]);
        Toastr::success('Product color deactived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.product-color.index');
    }

}
