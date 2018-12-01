<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryPartWord extends Model
{
    /**
		* The attributes that are mass assignable.
		*
		* @var array
	*/
	protected $fillable = [
	
		'story_part_id', 'user_id', 'word'
	
	];

	public function story_part()
	{

		return $this->belongsTo('App\StoryPart', 'story_part_id', 'id');

	}

	public function user()
	{

		return $this->belongsTo('App\User', 'user_id', 'id');
	
	}
}
