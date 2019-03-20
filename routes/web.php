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

Route::get('/', 'HomeController@index');

Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware('verified')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::get('reports', 'ReportController@index')->name('reports');
    Route::get('documentation', 'DocumentationController@index')->name('documentation');
    Route::get('billing', 'DashboardController@index')->name('billing');

    Route::prefix('accounts')->group(function() {
        Route::get('/{service}', 'AccountController@index')->name('accounts');
        Route::get('edit/{id}', 'AccountController@edit')->name('accounts.edit');
        Route::post('update/{id}', 'AccountController@update')->name('accounts.update');
        Route::post('delete/{id}', 'AccountController@destroy')->name('accounts.destroy');
    });

    Route::prefix('groups')->group(function() {
        Route::get('/{service}', 'GroupController@index')->name('groups');
        Route::get('create', 'GroupController@create')->name('groups.create');
        Route::post('store', 'GroupController@store')->name('groups.store');
        Route::get('show/{service}/{id}', 'GroupController@show')->name('groups.show');
        Route::get('edit/{service}/{id}', 'GroupController@edit')->name('groups.edit');
        Route::post('update/{service}/{id}', 'GroupController@update')->name('groups.update');
        Route::post('delete/{service}/{id}', 'GroupController@destroy')->name('groups.destroy');
    });

    Route::prefix('deposit')->group(function(){
        Route::get('/', 'DepositController@index')->name('deposit');
        Route::get('add', 'DepositController@add')->name('deposit-add');
        Route::post('store', 'DepositController@store')->name('deposit-store');
        Route::get('invoice/{id}', 'DepositController@invoice')->name('deposit-invoice');
        Route::get('cancel/{id}', 'DepositController@cancel')->name('deposit-cancel');
        Route::get('confirmation/{id}', 'DepositController@confirmation')->name('deposit-confirmation');
        Route::get('print/{id}', 'DepositController@print')->name('deposit-print');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
