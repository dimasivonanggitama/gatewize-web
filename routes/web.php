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

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('accounts', 'DashboardController@index')->name('accounts');
    Route::get('reports', 'DashboardController@index')->name('reports');
    Route::get('documentation', 'DashboardController@index')->name('documentation');
    Route::get('billing', 'DashboardController@index')->name('billing');
});

Route::get('/home', 'HomeController@index')->name('home');
