<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public $timestamps = true;
					
    protected $fillable = [
        'product_name',
        'product_image',
        'product_price',
        'product_brand',
        'product_category',
        'product_quantity',
        'product_description',
        'product_long_description',
        'status'

    ];

}
