<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/penduduk', function(){return view('profiles.penduduk');});
Route::get('/pendidikan', function(){return view('profiles.pendidikan');});
Route::get('/infrastruktur', function(){return view('profiles.infrastruktur');});
Route::post('/user/import', 'Admin\UserController@import');

Route::group
([ "as" => "admin.", "prefix" => "admin", "middleware" => 'auth' ], function () {

    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::get('/setting', 'Admin\SettingController@index')->name('setting');
    Route::get('/help', 'Admin\HelpController@index')->name('help');
    Route::get('/service', 'Admin\ServiceController@index')->name('service');
    Route::post('/user/import', 'Admin\UserController@import');
    Route::post('/photograph/store_multiple', 'Admin\PhotographController@store_multiple');
    Route::resource('user', 'Admin\UserController');
    Route::resource('profile', 'Admin\ProfileController');
    Route::resource('topic', 'Admin\TopicController');
    Route::resource('bulletin', 'Admin\BulletinController');
    Route::resource('agenda', 'Admin\AgendaController');
    Route::resource('broadcast', 'Admin\BroadcastController');
    Route::resource('photograph', 'Admin\PhotographController');
    Route::resource('recording', 'Admin\RecordingController');
});


