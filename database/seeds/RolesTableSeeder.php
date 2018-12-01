<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array( 'administrator', 'moderator', 'regular' );

        foreach ($roles as $role) {
        	
        	DB::table('roles')->insert([

        		'slug' => str_slug($role),
        		'name' => title_case($role),
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()

        	]);

        }
    }
}
