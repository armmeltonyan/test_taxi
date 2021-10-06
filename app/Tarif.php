<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
	protected $fillable = [
       	'title',
		'min_price',
		'price_per_km',
		'price_per_minute',
		'free_km_count',
		'free_minute_count',
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_tarif');
    }
}
