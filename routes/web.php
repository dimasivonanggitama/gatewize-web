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
    Route::get('accounts', 'AccountController@index')->name('accounts');
    Route::get('reports', 'ReportController@index')->name('reports');
    Route::get('documentation', 'DocumentationController@index')->name('documentation');
    Route::get('billing', 'DashboardController@index')->name('billing');
    
    Route::prefix('deposit')->group(function(){
        Route::get('/', 'DepositController@index')->name('deposit');
        Route::get('add', 'DepositController@add')->name('deposit-add');
        Route::post('store', 'DepositController@store')->name('deposit-store');
        Route::get('invoice/{id}', 'DepositController@invoice')->name('deposit-invoice');
        Route::get('cancel/{id}', 'DepositController@cancel')->name('deposit-cancel');
        Route::get('print/{id}', 'DepositController@print')->name('deposit-print');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
