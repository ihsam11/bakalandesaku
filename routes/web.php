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
Route::resource('profile', 'User\ProfilController');

Route::get('/kegiatan', 'User\BeritaController@kegiatan');
Route::get('/agenda', 'User\BeritaController@agenda');
Route::get('/agenda/agendatable', 'User\BeritaController@agendatable');
Route::get('/pembangunan', 'User\BeritaController@pembangunan');
Route::get('/pengumuman', 'User\BeritaController@pengumuman');

Route::get('/penduduk', function(){return view('profiles.penduduk');});
Route::get('/penduduk/userdatatable', 'User\ProfilController@userdatatable');
Route::get('/penduduk/userchart', 'User\ProfilController@userchart');
Route::get('/pendidikan', function(){return view('profiles.pendidikan');});
Route::get('/infrastruktur', function(){return view('profiles.infrastruktur');});
Route::get('/kesehatan', function(){return view('profiles.kesehatan');});
Route::get('/industri', function(){return view('profiles.industri');});

Route::get('/galeri', function(){return view('galeries.index');});


Route::group
([ "as" => "admin.", "prefix" => "admin", "middleware" => 'auth' ], function () {

    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::get('/setting', 'Admin\SettingController@index')->name('setting');
    Route::get('/help', 'Admin\HelpController@index')->name('help');
    Route::get('/service', 'Admin\ServiceController@index')->name('service');
    Route::post('/user/import', 'Admin\UserController@import');
    Route::post('/photograph/store_multiple', 'Admin\PhotographController@store_multiple');
    Route::resource('user', 'Admin\UserController');
    Route::resource('topic', 'Admin\TopicController');    
    Route::resource('profile', 'Admin\ProfileController');
    Route::resource('bulletin', 'Admin\BulletinController');
    Route::resource('agenda', 'Admin\AgendaController');
    Route::resource('broadcast', 'Admin\BroadcastController');
    Route::resource('photograph', 'Admin\PhotographController');
    Route::resource('recording', 'Admin\RecordingController');
});


