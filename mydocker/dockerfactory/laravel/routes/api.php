<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['namespace' => 'Api'], function() {
	// Route::resource('kospenusers', 'KospenusersController'); /* Defining controller as resource clash with custom route definition */
	Route::get('kospenusers', 'KospenusersController@index');
	Route::post('kospenusers/insidelocality', 'KospenusersController@customShowInsideLocality');
	Route::post('kospenusers/outsidelocality', 'KospenusersController@customShowOutsideLocality');
	Route::post('kospenusers/add', 'KospenusersController@store');
	Route::post('kospenusers/update', 'KospenusersController@update');
	Route::post('kospenusers/test', 'KospenusersController@test');
	Route::post('kospenusers/testoutrestreq', 'KospenusersController@testOutRestReq');
	Route::post('kospenusers/testscreeningsync', 'ScreeningsController@testScreeningSync');
});
Route::group(['namespace' => 'Api'], function() {
	// Route::resource('screenings', 'ScreeningsController');
});





























