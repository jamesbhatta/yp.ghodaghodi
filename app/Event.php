<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Support\Facades\File;
use Image;

class Event extends Model
{
	use Sluggable;

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

    /*
    * Store the thumbnail pic for events
    */
    public function storeThumbnail($originalFile)
    {
        // $originalFile = $request->file('profile_pic');
        $thumbnail = Image::make($originalFile)->resize(600, 400);
        $path = public_path().'/uploads/eventThumbs';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $thumbnailFilename = 'eventThumbs/'.md5($originalFile . microtime()) . '.' . $originalFile->getClientOriginalExtension();
        $thumbnail->save(public_path().'/uploads/'.$thumbnailFilename);
        return $thumbnailFilename;
    }
}
