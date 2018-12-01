<?php

namespace App\Http\Controllers;

use Auth;
use App\Story;
use App\StoryPart;
use App\StoryPartWord;
use App\StoryPartVersion;
use Illuminate\Http\Request;

class StoryController extends Controller
{

	/**
		* Show the application dashboard.
		*
		* @return \Illuminate\Http\Response
	*/
	
	public function index()
	{
	
		return view('stories');
	
	}

	public function create(Request $request)
	{
	
		$this->validate($request, [
	
			'title' => 'required|string',
	
			'type' => 'required|exists:story_types,id',
	
		]);

		$story = Story::create([

			'slug' => uniqid(),
			
			'story_type_id' => $request->input('type'),
			
			'user_id' => Auth::user()->id,
			
			'title' => title_case($request->input('title')),

		]);

		$title_story_part = $this->create_story_part($story->id, 'title', 'Introduction');
		
		$body_story_part = $this->create_story_part($story->id, 'body', '', false, $title_story_part->id);

		return redirect()->route('story.edit', $story->slug);
		
	}

	private function create_story_part($story_id, $indicator, $text, $parent_story_part_id = false, $title_story_part_id = false, $display_order = 1)
	{

		$story_part = StoryPart::create([
			
			'story_id' => $story_id,
			
			'indicator' => $indicator,
			
			'parent_story_part_id' => $parent_story_part_id ? $parent_story_part_id : null,
			
			'title_story_part_id' => $title_story_part_id ? $title_story_part_id : null

		]);

		$words = $this->string_to_array($text);

		$positions = array();

		foreach ($words as $wrd) {
				
			$word = StoryPartWord::create([
				
				'story_part_id' => $story_part->id,

				'user_id' => Auth::user()->id,

				'word' => $wrd

			]);

			array_push($positions, $word->id);

		}

		$words_position = implode(',', $positions);
		
		$story_part_version = StoryPartVersion::create([
			
			'story_part_id' => $story_part->id,

			'user_id' => Auth::user()->id,
			
			'words_position' => $words_position,

		]);

		$story_part->story_part_version_id = $story_part_version->id;

		$story_part->save();

		return $story_part;

	}

	private function string_to_array($string)
	{
		
		return preg_split(
			'/(<\/?\w+[^<>]*>)|\s+/',
			$string,
			null,
			PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
		);

	}

	public function show($slug)
	{

		$story = Story::where('slug', $slug)->firstOrFail();


	}

	public function edit($slug, $title_story_part_id = 0, $parent_story_part_id = 0)
	{

		$story = Story::where('slug', $slug)->firstOrFail();

		$toc = $this->get_toc($story->id);

	}

	private function get_toc($story_id)
	{

		$story = Story::where('id', $story_id)->firstOrFail();

		return $this->build_toc($story->story_parts->where('indicator', 'title'), false);

	}

	private function build_toc()
	{

	}

}
