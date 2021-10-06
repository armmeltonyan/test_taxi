<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	protected $fillable = [
       	'driver_id',
		'brand',
		'model',
		'gos_number',
		'color',
		'year'
    ];

    public function tarifs()
    {
        return $this->belongsToMany(Tarif::class, 'car_tarif');
    }
}
