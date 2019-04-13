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


// Routing for Homepage
Route::get('/', 'Home\HomeController@index')->name('homepage');
Route::prefix('pages')->group(function() {
	Route::get('privacy', 'Home\HomeController@privacy')->name('privacy');
    Route::get('terms', 'Home\HomeController@terms')->name('terms');
    Route::get('contact-us', 'Home\HomeController@contact')->name('contact');
});


//Routing for Backend User
Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function () {
    Route::get('dashboard', 'Member\DashboardController@index')->name('dashboard');

    Route::prefix('profile')->group(function(){
        Route::get('/', 'Member\ProfileController@index')->name('profile');
        Route::post('/update', 'Member\ProfileController@update')->name('profile.update');
    });

    Route::prefix('change-password')->group(function() {
        Route::get('/', 'Auth/ResetPasswordController@index')->name('change-password');
    });

    Route::prefix('accounts')->group(function() {
        Route::get('/{service}', 'Member\AccountController@index')->name('accounts');
        Route::get('edit/{id}', 'Member\AccountController@edit')->name('accounts.edit');
        Route::post('store/{service}', 'Member\AccountController@store')->name('accounts.store');
        Route::post('update/{id}', 'Member\AccountController@update')->name('accounts.update');
        Route::post('delete/{id}', 'Member\AccountController@destroy')->name('accounts.destroy');
        Route::get('/group/{group_id}/{service}', 'Member\AccountController@group')->name('accounts.group');
        Route::post('move/{service}/', 'Member\AccountController@move')->name('accounts.move');
    });

    Route::prefix('groups')->group(function() {
        Route::post('store', 'Member\GroupController@store')->name('groups.store');
        Route::get('refresh/{service}/{id}', 'Member\GroupController@refresh')->name('groups.refresh');
        Route::post('update/{service}/', 'Member\GroupController@update')->name('groups.update');
        Route::delete('delete/{service}', 'Member\GroupController@destroy')->name('groups.destroy');
        Route::get('digipos', 'Member\GroupController@digipos')->name('groups.digipos');
        Route::get('gojek', 'Member\GroupController@gojek')->name('groups.gojek');
        Route::get('ovo', 'Member\GroupController@ovo')->name('groups.ovo');
    });

    Route::prefix('deposit')->group(function(){
        Route::get('/', 'Member\DepositController@index')->name('deposit');
        Route::get('add', 'Member\DepositController@add')->name('deposit.add');
        Route::post('store', 'Member\DepositController@store')->name('deposit.store');
        Route::get('invoice/{id}', 'Member\DepositController@invoice')->name('deposit.invoice');
        Route::get('cancel/{id}', 'Member\DepositController@cancel')->name('deposit.cancel');
        Route::get('confirmation/{id}', 'Member\DepositController@confirmation')->name('deposit.confirmation');
        Route::get('manual-confirmation/{id}', 'Member\DepositController@manual_confirmation')->name('deposit.confirmation.manual');
        Route::post('manual-confirmation/{id}', 'Member\DepositController@store_manual_confirmation')->name('deposit.confirmation.manual.store');
        Route::get('print/{id}', 'Member\DepositController@print')->name('deposit.print');
    });

    Route::prefix('products')->group(function(){
        Route::get('gojek', 'Member\ProductController@gojek')->name('products.gojek');
        Route::get('digipos', 'Member\ProductController@digipos')->name('products.digipos');
        Route::get('ovo', 'Member\ProductController@ovo')->name('products.ovo');
        // Route::get('linkaja', 'ProductController@ovo')->name('product.linkaja');
    });

    Route::prefix('reports')->group(function(){
        Route::get('gojek', 'Member\ReportController@gojek')->name('reports.gojek');
        Route::get('digipos', 'Member\ReportController@digipos')->name('reports.digipos');
        Route::get('ovo', 'Member\ReportController@ovo')->name('reports.ovo');
    });

    Route::prefix('ticket')->group(function(){
        Route::get('create', 'Member\TicketController@create')->name('ticket.create');
        Route::post('create', 'Member\TicketController@store');
        Route::get('my', 'Member\TicketController@index')->name('ticket.index');
        Route::get('{ticketId}', 'Member\TicketController@show')->name('ticket.show');
        Route::post('{ticketId}/close', 'Member\CommentsController@close')->name('ticket.close');
    });
    Route::prefix('comment')->group(function(){
        Route::get('', 'Member\CommentsController@index')->name('comment.index');
        Route::post('', 'Member\CommentsController@postComment')->name('comment.store');
        Route::post('{ticketId}/close', 'Member\CommentsController@close');
    });

    Route::prefix('product')->group(function(){
        Route::get('/', 'ProductController@index');
    });

    Route::get('integration', 'Member\IntegrationController@index')->name('integration');
    Route::get('store', 'Member\StoreController@index')->middleware('role:normaluser')->name('store');
    Route::post('subscribe', 'Member\StoreController@subscribe')->middleware('role:normaluser');
});


// Routing for Backend Admin
Route::group(['prefix' => 'admin', 'middleware' => 'role:superadmin'], function(){
    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin_dashboard');
    Route::get('/products', 'Admin\ProductController@index');
    Route::get('/products/create', 'Admin\ProductController@create');
    Route::post('/products/create', 'Admin\ProductController@store');
    Route::delete('/products/{productId}', 'Admin\ProductController@destroy');
    Route::put('/products/{productId}', 'Admin\ProductController@update');

    Route::get('/users', 'Admin\UserController@index');
    Route::post('/users', 'Admin\UserController@store');
    Route::delete('/users/{userId}', 'Admin\UserController@destroy');
    Route::put('/users/{userId}', 'Admin\UserController@update');

    Route::get('/news', 'Admin\NewsController@index');
    Route::post('/news', 'Admin\NewsController@store');
    Route::get('/news/create', 'Admin\NewsController@create');
    Route::delete('/news/{newsId}', 'Admin\NewsController@destroy');
    Route::put('/news/{newsId}', 'Admin\NewsController@update');

    Route::get('/tickets', 'Admin\TicketController@index');
    Route::post('/tickets', 'Admin\TicketController@store');
    Route::get('/tickets/create', 'Admin\TicketController@create');
    Route::post('/tickets/{ticketId}/close', 'Admin\TicketController@close');
    Route::post('/tickets/comment', 'Admin\CommentsController@postComment');
    Route::delete('/tickets/{ticketId}', 'Admin\TicketController@destroy');
    Route::put('/tickets/{ticketId}', 'Admin\TicketController@update');


    Route::get('/categories', 'Admin\CategoryController@index');
    Route::post('/categories', 'Admin\CategoryController@store');
    Route::delete('/categories/{categoryId}', 'Admin\CategoryController@destroy');
    Route::put('/categories/{categoryId}', 'Admin\CategoryController@update');

    Route::get('/transactions', 'Admin\TransactionController@index');
    Route::delete('/transactions/{transactionId}', 'Admin\TransactionController@destroy');
    Route::post('/transactions/{transactionId}', 'Admin\TransactionController@approve');

    Route::get('/announcement', 'Admin\AnnouncementController@index')->name('announcement');
    Route::post('/announcement', 'Admin\AnnouncementController@store')->name('announcement.store');
    Route::delete('/announcement', 'Admin\AnnouncementController@destroy')->name('announcement.destroy');
    Route::put('/announcement', 'Admin\AnnouncementController@update')->name('announcement.update');

    Route::get('/announcement/category', 'Admin\AnnouncementCategoryController@index')->name('announcement-category');
    Route::post('/announcement/category', 'Admin\AnnouncementCategoryController@store')->name('announcement-category.store');
    Route::delete('/announcement/category', 'Admin\AnnouncementCategoryController@destroy')->name('announcement-category.destroy');
    Route::put('/announcement/category', 'Admin\AnnouncementCategoryController@update')->name('announcement-category.update');
});
