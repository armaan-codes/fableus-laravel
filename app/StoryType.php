<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryType extends Model
{
	/**
		* The attributes that are mass assignable.
		*
		* @var array
	*/
	protected $fillable = [
	
		'slug', 'name'
	
	];

	public function stories()
	{

		return $this->hasMany('App\Story', 'story_type_id', 'id');

	}

}
