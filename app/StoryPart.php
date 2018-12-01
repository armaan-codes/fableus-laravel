<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoryPart extends Model
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
	
		'story_id', 'indicator', 'story_part_version_id', 'parent_story_part_id', 'title_story_part_id', 'display_order'
	
	];

	public function story()
	{

		return $this->belongsTo('App\Story', 'story_id', 'id');

	}

	public function story_part_childs()
	{
	
		return $this->hasMany('App\StoryPart', 'parent_story_part_id', 'id');
	
	}

	public function story_part_parent()
	{

		return $this->belongsTo('App\StoryPart', 'parent_story_part_id', 'id');

	}

	public function story_part_body()
	{

		return $this->hasOne('App\StoryPart', 'title_story_part_id', 'id');

	}

	public function story_part_title()
	{
	
		return $this->belongsTo('App\StoryPart', 'title_story_part_id', 'id');
	
	}

	public function latest_version()
	{

		return $this->belongsTo('App\StoryPartVersion', 'story_part_version_id', 'id');

	}
}
