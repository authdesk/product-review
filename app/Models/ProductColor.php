<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    public $timestamps = true;
					
    protected $fillable = [
        'product_name',
        'product_color',
        'color_image',
        'product_image',
        'status'

    ];
}
