<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::get('/','SemesterController@create');
Route::get('semester/create','SemesterController@create');
Route::post('semester/save','SemesterController@save');
Route::get('semester/show','SemesterController@show_semester');
Route::get('semester/delete/{id}','SemesterController@delete_semester');
Route::get('semester/edit/{id}','SemesterController@edit_semester');
Route::any('semester/update/{id}', ['as' => 'semester.update','uses' => 'SemesterController@update_semester' ]);
Route::get('/scroll','SemesterController@scroll');
Route::get('upload/image','SemesterController@images_upload');
Route::post('upload/save','SemesterController@images_save');