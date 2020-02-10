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
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@getLogin');
Route::post('login', 'Auth\LoginController@postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::get('dashboard', 'Auth\LoginController@getDashboard');
    Route::resource('categories', 'CategoryController');
	Route::post('logout', 'Auth\LoginController@logout');
    Route::get('/dashboard', 'Backend\DashboardController@getDashboard');
    Route::resource('products', 'Backend\ProductController');
    Route::resource('categories', 'Backend\CategoryController');
    Route::post('logout', 'Auth\LoginController@logout');
});
