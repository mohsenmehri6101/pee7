<?php

Route::get('/', 'SupplierController@index')->name('supplier.index');
//agency
Route::group(['prefix' => 'agency'], function () {
    Route::get('/', 'AgencyController@index')->name('supplier.agency.index');
    Route::get('create', 'AgencyController@create')->name('supplier.agency.create');
    Route::post('store', 'AgencyController@store')->name('supplier.agency.store');
    Route::get('/edit/{agency}', 'AgencyController@edit')->name('supplier.agency.edit');
    Route::post('/update', 'AgencyController@update')->name('supplier.agency.update');
    Route::get('/show/{agency}', 'AgencyController@show')->name('supplier.agency.show');
    Route::delete('/destroy', 'AgencyController@destroy')->name('supplier.agency.destroy');
    //ajax
    Route::get('/search', 'AgencyController@search')->name('supplier.agency.search');
});
//agency

//product
Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProductController@index')->name('supplier.product.index');
    Route::get('/all', 'ProductController@all')->name('supplier.product.all');
    Route::get('create', 'ProductController@create')->name('supplier.product.create');
    Route::post('store', 'ProductController@store')->name('supplier.product.store');
    Route::get('/edit/{product}', 'ProductController@edit')->name('supplier.product.edit');
    Route::post('/update', 'ProductController@update')->name('supplier.product.update');
    Route::get('/show/{product}', 'ProductController@show')->name('supplier.product.show');
    Route::delete('/destroy/{id}', 'ProductController@destroy')->name('supplier.product.destroy');
    //ajax
    Route::get('/search', 'ProductController@search')->name('supplier.product.search');
    Route::post('/block/{product}', 'ProductController@block')->name('supplier.product.block');
});
//product

//ajax
Route::get('search-product', 'SupplierController@search_product');
//ajax

//auction
Route::group(['prefix' => 'auction'], function () {
    Route::get('/', 'AuctionController@all')->name('supplier.auction.all');
    Route::get('/index', 'AuctionController@index')->name('supplier.auction.index');
    Route::get('/create', 'AuctionController@create')->name('supplier.auction.create');
    Route::post('/store', 'AuctionController@store')->name('supplier.auction.store');
    Route::get('/{id}/edit', 'AuctionController@edit_auction')->name('supplier.auction.edit');
    Route::post('/update/{id}', 'AuctionController@update_auction')->name('supplier.auction.update');
    Route::get('/myauction/{id}', 'AuctionController@myauction')->name('supplier.auction.myauction');
    Route::post('/myauction', 'AuctionController@savemyauction')->name('supplier.auction.savemyauction');
    Route::get('/product/{id}/edit', 'AuctionController@edit_product')->name('supplier.auction.product.edit');
    Route::post('/product/update/{id}', 'AuctionController@update_product')->name('supplier.auction.product.update');
});
//end auction

//ticket
Route::group(['prefix' => 'ticket'], function () {
    Route::get('', 'SupplierController@ticket')->name('supplier.ticket');
    Route::post('', 'SupplierController@saveticket');
    Route::post('count', 'SupplierController@count_message')->name('supplier.ticket.count');
});
//ticket
//Notification
Route::group(['prefix' => 'notification'], function () {
    //board
    Route::group(['prefix' => 'board'], function () {
        Route::get('/', 'NotificationController@index')->name('supplier.notification.board.index');
    });
    //board
    //mail
    /* Route::group(['prefix'=>'mail'],function (){

     });*/
    //mail
    //sms
    /* Route::group(['prefix'=>'sms'],function (){

     });*/
    //sms
});
//Notification

//clerk
Route::group(['prefix' => 'clerk',], function () {
    Route::get('/', 'ClerkController@index')->name('supplier.clerk.index');
    Route::get('/create', 'ClerkController@create')->name('supplier.clerk.create');
    Route::post('/store', 'ClerkController@store')->name('supplier.clerk.store');
    Route::get('/show/{id}', 'ClerkController@show')->name('supplier.clerk.show');
    // permission
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', 'PermissionController@index')->name('supplier.clerk.permission.index');
        Route::get('/{user}', 'PermissionController@create')->name('supplier.clerk.permission.create');
        Route::post('/{user}', 'PermissionController@store')->name('supplier.clerk.permission.store');
        Route::get('/edit/{user}', 'PermissionController@edit')->name('supplier.clerk.permission.edit');
        Route::post('/edit/{user}', 'PermissionController@update')->name('supplier.clerk.permission.update');
    });
    // permission
});
//clerk
