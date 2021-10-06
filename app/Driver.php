<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{

	protected $fillable = [
        'full_name',
		'birthdate',
		'license_serial',
		'license_expires_at',
    ];

    public function Cars()
    {
        return $this->hasMany(Car::class);
    }
}
