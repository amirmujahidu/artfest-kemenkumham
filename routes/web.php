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

Route::get('/', 'PageController@Index')->name('index');
Route::get('/pertandingan', 'PageController@pertandingan')->name('pertandingan');
Route::get('/pertandingan/{id}', 'PageController@pertandinganDetail')->name('pertandingan-detail');


Auth::routes();

Route::group(['as'=>'admin.', 'middleware' => 'auth'], function() {
	Route::get('/admin', 'Admin\AdminController@Index')->name('index');
	Route::get('/admin/dashboard', 'Admin\AdminController@Index')->name('dashboard');
	Route::resource('admin/streaming', 'Admin\StreamingController');
});

Route::group(['prefix' => 'api'], function(){
	Route::get('/checkCookie', 'ApiController@checkCookie');
	Route::get('/vote', 'ApiController@vote');
	Route::get('/setCookie', 'ApiController@setCookie');
});
