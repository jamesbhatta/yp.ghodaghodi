<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'zone_id'];
    /**
     * Get the post that owns the comment.
     */
    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    /**
     * Get the businesses in this city.
     */
	public function businesses()
	{
		return $this->hasMany('App\Business');
	}
}
