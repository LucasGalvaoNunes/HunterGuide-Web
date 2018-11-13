<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function (){
    return response()->json([
        'latest_api_version' => config('app.api_version')
    ]);
});


Route::namespace('API\v1')->prefix('v1')->name('api.v1.')->group(function(){
    Route::get('/', function (){
        return response()->json([
            'latest_api_version' => config('app.api_version'),
            'api_version' => '1.0'
        ]);
    });

    Route::post('login', 'UsersController@login');
    Route::post('create', 'UsersController@create');
    Route::post('update', 'UsersController@update');

});
