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

// Route::middleware('auth:api')->group(function() { 
// Route::group(['prefix' => '/api'], function () {
    //agenda
    Route::get('/agenda', 'API\AgendaController@index');
    Route::get('/agenda?id={id}', 'API\AgendaController@show');

    //broadcast
    Route::get('/broadcast', 'API\BroadcastController@index');
    Route::get('/broadcast?id={id}', 'API\BroadcastController@show');

    //bulletin
    Route::get('/bulletin', 'API\BulletinController@index');
    Route::get('/bulletin?id={id}', 'API\BulletinController@show');

    //photograph
    Route::get('/photograph', 'API\PhotographController@index');
    Route::get('/photograph?id={id}', 'API\PhotographController@show');

    //profile
    Route::get('/profile', 'API\ProfileController@index');
    Route::get('/profile?id={id}', 'API\ProfileController@show');

    //recording
    Route::get('/recording', 'API\RecordingController@index');
    Route::get('/recording?id={id}', 'API\RecordingController@show');

    //user
    Route::get('/user', 'API\UserController@index');
    Route::get('/user?id={id}', 'API\UserController@show');
// });
// });

