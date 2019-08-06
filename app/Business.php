<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Image;

class Business extends Model
{
	use \Spatie\Tags\HasTags;
	use Sluggable;
	use SluggableScopeHelpers;
	use SoftDeletes;
	
	protected $guarded = ['id'];
	/**
	 * Return the sluggable configuration array for this model.
     *
     * @return array
     */
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'name',
				'onUpdate' => true,
			]
		];
	}


    /**
     * Get the cities of this business.
     */
    public function city()
    {
    	return $this->belongsTo('App\City');
    }
    /**
     * Get the business hours of this business.
     */
    public function business_hours()
    {
        return $this->hasMany('App\BusinessHour');
    }

    public function storeThumbnail($originalFile)
    {
    	// $originalFile = $request->file('profile_pic');
     $thumbnail = Image::make($originalFile)->resize(300, 200);
     $path = public_path().'/uploads/thumbnail/';
     File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
     $thumbnailFilename = 'thumbnail/'.md5($originalFile . microtime()) . '.' . $originalFile->getClientOriginalExtension();
     $thumbnail->save(public_path().'/uploads/'.$thumbnailFilename);
     return $thumbnailFilename;
 }
}
