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

Route::get('/', ['middleware' => 'guest', 'uses' => 'PageController@home']);

Route::get('/dashboard', 'PageController@dashboard');

Route::get('/profile', 'ProfileController@index');
Route::post('/update', 'ProfileController@update');
Route::post('/change-password', 'ProfileController@changePassword');

Route::get('/browse', 'PageController@browse');

Route::get('/removeskill/{id}', 'ProfileController@removeOneSkill');


//login routes
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

//register routes
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);