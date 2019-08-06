<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
	protected $guarded = ['id'];
	
    public function business()
    {
    	return $this->belongsTo('App\Business');
    }
}
