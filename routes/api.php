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

Route::group([
	'middleware' => ['api'],
	'prefix' => 'pdd'
], function(){

	Route::get('/count', 'PddController@getCount')->name('api:pdd:count');

    Route::get('/{id}', 'PddController@getTicket')->name('api:pdd:get');

});