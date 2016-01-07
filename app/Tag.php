<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	protected $fillable = [
		'name'
	];
	/**
	 * Get the articles assosiated with the given tags.
	 */
    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }
}
