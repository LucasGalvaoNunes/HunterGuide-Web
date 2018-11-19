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

    Route::prefix('users')->group(function () {
        Route::post('login', 'UsersController@login');
        Route::post('create', 'UsersController@create');

        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('profile', 'UsersController@profile');
            Route::post('update', 'UsersController@update');
        });
    });

    Route::prefix('consoles')->group(function () {
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('all', 'ConsolesController@all');
        });
    });

    Route::prefix('categorys')->group(function () {
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('ofConsole/{idConsole}', 'CategorysController@allCategorysOfConsole');
        });
    });

    Route::prefix('games')->group(function () {
        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('ofConsole', 'GamesController@gamesOfConsole');
        });
    });

    Route::prefix('steps')->group(function () {
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('stepsOfGame/{idGames}/{idStep?}', 'StepsController@stepsOfGame');
        });
    });

    Route::prefix('guides')->group(function () {
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('guideOfStep/{idStep}', 'GuidesController@guideOfStep');
        });
    });


});
