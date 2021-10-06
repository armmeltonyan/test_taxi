<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'address_from',
		'address_to',
		'coordinate_from',
		'coordinate_to',
		'min_price',
		'price_by_km',
		'price_by_minute',
		'final_price',
		'status',
    ];
}
