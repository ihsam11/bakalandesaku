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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/penduduk', function(){return view('profiles.penduduk');});
Route::get('/pendidikan', function(){return view('profiles.pendidikan');});
Route::get('/infrastruktur', function(){return view('profiles.infrastruktur');});

Route::get('/admin', 'HomeController@index');
Route::resource('/posts', 'PostController');
Route::resource('/categories', 'CategoryController');
Route::resource('/users', 'UserController');
Route::resource('/agendas', 'AgendaController');
Route::resource('/roles', 'RoleController');
Route::resource('/videos', 'VideoController');

