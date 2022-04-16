<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;


    public $timestamps = true;
    							
    protected $fillable = [
        'product_id',
        'customer_name',
        'email',
        'review_count',
        'datetime',
        'title',
        'message',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
