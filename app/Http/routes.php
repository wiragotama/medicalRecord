<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::model('patients','Patients');
Route::model('records','Records');

// Use slugs rather than IDs in URLs
Route::bind('patients', function($value, $route) {
	return App\Patients::whereSlug($value)->first();
});

Route::bind('records', function($value, $route) {
	return App\Records::whereSlug($value)->first();
});

Route::get('/','controller@index');
Route::get('newPatient','controller@newPatient');
Route::get('listPatient','controller@listPatient');
Route::get('searchPatient','controller@showSearchPatient');

Route::post('createPatient', 'controller@createPatient');
Route::post('editPatient', 'controller@editPatient');
Route::post('updatePatient', 'controller@updatePatient');
Route::post('deletePatient', 'controller@deletePatient');
Route::post('showRecord', 'controller@showRecord');
Route::post('newRecord', 'controller@newRecord');
Route::post('editRecord', 'controller@editRecord');
Route::post('updateRecord', 'controller@updateRecord');
Route::post('deleteRecord', 'controller@deleteRecord');
Route::post('searchPatient', 'controller@searchPatient');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
