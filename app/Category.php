<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected  $fillable = ['name', 'description'];

	/**
	* Get the Businesses in this category
	*/
	public function businesses()
	{
		return $this->hasMany('App\Business');
	}

	public function popularCategories()
	{
		return $this->hasOne('App\PopularCat');
	}
}
