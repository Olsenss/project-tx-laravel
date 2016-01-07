<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
	//Which fields are you okay with being fileld out. 
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',
        'user_id'
    ];

    protected $dates = ['published_at'];	
    
    public function scopePublished($query){
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function setPublishedAtAttribute($date){

    	$this->attributes['published_at'] = Carbon::parse($date);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /** Get the tags associated with the given article. */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /** Get a list of tag ids associated with the current article.
    *
    *@return array
    */
    public function getTagListAtrribute()
    {
        return $this->tags->lists('id')->all();
    }
}
