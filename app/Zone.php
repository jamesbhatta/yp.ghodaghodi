<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the cities of this zone.
     */
	public function cities()
	{
		return $this->hasMany('App\City');
	}
}
