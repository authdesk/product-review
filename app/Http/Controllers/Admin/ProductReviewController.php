<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProductReviewController extends Controller
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
        $products = ProductReview::get()->groupBy('product_id');

        return view('admin.product_review.all', compact('products'));
        
    }


    public function product_reviews($product_id)
    {
        $product_reviews = ProductReview::where('product_id', $product_id)->get();

        return view('admin.product_review.product_reviews', compact('product_reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        ProductReview::findOrFail($id)->delete();
        Toastr::success('Review data deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    
    }
}
