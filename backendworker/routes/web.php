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

// URL::forceRootUrl('http://10.151.38.38:8080');

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('admin', function () {
    return view('admin_template');
});*/

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'HomeController@admin')->name("pilihmatkul");
});


Route::post('/matkul/ambil','HomeController@add')->name("tambahmatkul");

Route::get('/matkul','HomeController@list')->name("matkul");

Route::get('/login', 'AuthController@login')->name('login');

Route::post('/login', 'AuthController@doLogin');

Route::get('/register', 'AuthController@register')->name('register');

Route::post('/register', 'AuthController@doRegister');

Route::post('/logout', 'AuthController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
