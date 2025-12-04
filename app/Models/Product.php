<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'category_id',
        'images',
        'specifications',
        'status',
        'flags',
    ];

    protected $casts = [
        'images' => 'array',
        'specifications' => 'array',
         'flags' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

