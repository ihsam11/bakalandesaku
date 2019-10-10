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

Route::group 
([ "as" => "admin.", "prefix" => "admin", "middleware" => 'auth' ], function () {
    
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::get('/user', 'Admin\UserController@index')->name('user');    
    Route::get('/post', 'Admin\PostController@index')->name('post');
    Route::get('/gallery', 'Admin\GalleryController@index')->name('gallery');
    Route::get('/setting', 'Admin\SettingController@index')->name('setting');
    Route::get('/help', 'Admin\HelpController@index')->name('help');
    Route::get('/service', 'Admin\ServiceController@index')->name('service'); 
    Route::resource('/profile', 'Admin\ProfileController');
    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/news', 'Admin\NewsController');
    Route::resource('/agenda', 'Admin\AgendaController');
    Route::resource('/announcement', 'Admin\AnnouncementController');
    Route::resource('/photo', 'Admin\PhotoController');
    Route::resource('/video', 'Admin\VideoController');
});


