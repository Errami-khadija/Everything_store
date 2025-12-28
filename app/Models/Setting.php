<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'store_name',
        'store_description',
        'cash_on_delivery',
        'delivery_fee',
        'store_email',
        'store_phone',
    ];

    protected $casts = [
        'cash_on_delivery' => 'boolean',
        'delivery_fee' => 'decimal:2',
    ];
}
