<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;

class SiteController extends Controller
{
    public function index()
    {
        $product = Product::first();

        $product_colors = ProductColor::where('product_name', "Gent T-Shirt 001")->get();

        $product_images = ProductImage::where('product_name', "Gent T-Shirt 001")->get();
        
        return view('welcome', compact('product','product_colors','product_images'));
    }
}
