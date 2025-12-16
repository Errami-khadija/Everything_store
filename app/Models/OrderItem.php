<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
      use HasFactory;

    protected $fillable = [
    'order_id', 
    'product_id', 
    'product_name', 
    'product_sku', 
    'product_image', 
    'quantity', 
    'price', 
    'total_price'
];

   public function product()
{
    return $this->belongsTo(Product::class);
}
}
