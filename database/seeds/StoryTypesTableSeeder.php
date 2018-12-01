<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoryTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array( 'story', 'short story', 'novel', 'screenplay', 'article' );

        foreach ($types as $type) {
        	
        	DB::table('story_types')->insert([

        		'slug' => str_slug($type),
        		'name' => title_case($type),
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()

        	]);

        }
    }
}
