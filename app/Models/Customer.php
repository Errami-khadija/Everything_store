<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable = ['name', 'phone', 'city', 'address','is_blocked'];
   protected $casts = [
    'is_blocked' => 'boolean',
];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
