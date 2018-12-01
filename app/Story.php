<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
	use SoftDeletes;

	/**
		* The attributes that should be mutated to dates.
		*
		* @var array
	*/
	protected $dates = ['deleted_at'];

	/**
		* The attributes that are mass assignable.
		*
		* @var array
	*/
	protected $fillable = [
	
		'slug', 'story_type_id', 'user_id', 'title', 'image', 'image_properties'
	
	];

	public function story_type()
	{

		return $this->belongsTo('App\StoryType', 'story_type_id', 'id');

	}

	public function story_owner()
	{

		return $this->belongsTo('App\User', 'user_id', 'id');

	}

	public function story_parts()
	{

		return $this->hasMany('App\StoryPart', 'story_id', 'id');

	}

}
