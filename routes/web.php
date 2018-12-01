<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {

	return view('welcome');

});

Auth::routes();

Route::get('/stories', [
	'uses' => 'StoryController@index',
	'as' => 'stories'
]);

Route::post('/story', [
	'uses' => 'StoryController@create',
	'as' => 'story.create'
]);

Route::get('/story/view/{slug}', [
	'uses' => 'StoryController@show',
	'as' => 'story.show'
]);

Route::get('/story/edit/{slug}', [
	'uses' => 'StoryController@edit',
	'as' => 'story.edit'
]);