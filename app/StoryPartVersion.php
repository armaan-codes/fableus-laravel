<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryPartVersion extends Model
{
    /**
		* The attributes that are mass assignable.
		*
		* @var array
	*/
	protected $fillable = [
	
		'story_part_id', 'user_id', 'words_position'
	
	];

	public function user()
	{

		return $this->belongsTo('App\User', 'user_id', 'id');
	
	}


}
