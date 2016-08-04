<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('Home', 'HomeController@getHome');

Route::get('map', 'HomeController@getMap');
Route::get('template', 'HomeController@getTemplate');

Route::get('event', function()
{
    return View::make('pages.event');
});

Route::get('case', function()
{
    return View::make('pages.case');
});


/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
