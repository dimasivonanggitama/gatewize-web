<?php

use App\Gopay;
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
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::get('documentation', 'DocumentationController@index')->name('documentation');
    Route::get('billing', 'DashboardController@index')->name('billing');

    // Route::prefix('digipos')->group(function(){
    //     Route::get('/', )
    // });
    Route::prefix('profile')->group(function(){
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::post('/update', 'ProfileController@update')->name('profile.update');
    });

    Route::prefix('accounts')->group(function() {
        Route::get('/{service}', 'AccountController@index')->name('accounts');
        Route::get('edit/{id}', 'AccountController@edit')->name('accounts.edit');
        Route::post('store/{service}', 'AccountController@store')->name('accounts.store');
        Route::post('update/{id}', 'AccountController@update')->name('accounts.update');
        Route::post('delete/{id}', 'AccountController@destroy')->name('accounts.destroy');
        Route::get('/group/{group_id}/{service}', 'AccountController@group')->name('accounts.group');
        Route::get('digipos', 'AccountController@digipos')->name('accounts.digipos');
        Route::post('move/{service}/', 'AccountController@move')->name('accounts.move');
    });

    Route::prefix('groups')->group(function() {
        Route::get('/{service}', 'GroupController@index')->name('groups');
        Route::get('create', 'GroupController@create')->name('groups.create');
        Route::post('store', 'GroupController@store')->name('groups.store');
        Route::get('show/{service}/{id}', 'GroupController@show')->name('groups.show');
        Route::get('refresh/{service}/{id}', 'GroupController@refresh')->name('groups.refresh');
        // Route::get('edit/{service}/{id}', 'GroupController@edit')->name('groups.edit');
        Route::post('update/{service}/', 'GroupController@update')->name('groups.update');
        Route::delete('delete/{service}', 'GroupController@destroy')->name('groups.destroy');
        Route::get('digipos', 'GroupController@digipos')->name('groups.digipos');
        Route::get('gojek', 'GroupController@gojek')->name('groups.gojek');
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

    Route::prefix('products')->group(function(){
        Route::get('gojek', 'ProductController@gojek')->name('products.gojek');
        Route::get('digipos', 'ProductController@digipos')->name('products.digipos');
        // Route::get('ovo', 'ProductController@ovo')->name('product.ovo');
        // Route::get('linkaja', 'ProductController@ovo')->name('product.linkaja');
    });
	
    Route::prefix('reports')->group(function(){
        Route::get('gojek', 'ReportController@gojek')->name('reports.gojek');
    });

    Route::prefix('ticket')->group(function(){
        Route::get('create', 'TicketController@create')->name('ticket.create');
        Route::post('create', 'TicketController@store');
        Route::get('my', 'TicketController@index')->name('ticket.index');
        Route::get('{ticketId}', 'TicketController@show')->name('ticket.show');
    });
    Route::prefix('comment')->group(function(){
        Route::get('', 'CommentsController@index');
        Route::post('', 'CommentsController@postComment');
        Route::post('{ticketId}/close', 'CommentsController@close');
    });
});
		
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('pages')->group(function() {
	Route::get('/privacy-policy', 'PrivacyPolicyController@index')->name('privacy-policy');
	Route::get('/contact-us', 'ContactUsController@index')->name('contact-us');
	Route::get('/term-of-service', 'ToSController@index')->name('tos');
});