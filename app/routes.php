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
/*
Route::get('/', function()
{
	return View::make('hello');
});*/

//View
Route::get('/','IndexController@index');

//Database
Route::get('/db/products/{pid?}','ProductListController@get');

//Cart Routes
Route::get('/cart','CartController@get');
Route::post('/cart','CartController@set');
Route::get('/cart/flush','CartController@flush');