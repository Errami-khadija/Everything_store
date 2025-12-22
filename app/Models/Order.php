<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
      use HasFactory;
    protected $fillable = [
    'customer_id',
    'city',
    'customer_name',
    'customer_phone', 
    'customer_address', 
    'total_amount', 
    'total_items',
    'status'
];
    public function items()
{
    return $this->hasMany(OrderItem::class);
}
public function customer()
{
    return $this->belongsTo(Customer::class);
}

}
