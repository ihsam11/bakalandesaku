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

Route::get('admin', 'Admin\HomeController@index')->name('admin');
Route::resource('admin/news', 'Admin\PostController');
Route::resource('admin/categories', 'Admin\CategoryController');
Route::resource('admin/users', 'Admin\UserController');
Route::resource('admin/agendas', 'Admin\AgendaController');
Route::resource('admin/roles', 'Admin\RoleController');
Route::resource('admin/videos', 'Admin\VideoController');

