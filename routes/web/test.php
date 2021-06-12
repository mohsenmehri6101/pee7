<?php

Route::get('/', 'TestController@index')->name('test.index');
Route::get('/notificationAll', 'TestController@notificationAll')->name('test.notification.all');
Route::get('/agency', 'TestController@createAgency')->name('test.agency');
//yajra
Route::group(['prefix' => 'yajra'], function () {
    //section one
    Route::get('/one', 'TestController@one')->name('test.yajra.one');
    Route::get('/one_getusers', 'TestController@one_getusers')->name('test.yajra.one_getusers');
    //section two
    Route::get('/two', 'TestController@two')->name('test.yajra.two');
    Route::get('/two_getusers', 'TestController@two_getusers')->name('test.yajra.two_getusers');
    //section three
    Route::get('/three', 'TestController@three')->name('test.yajra.three');
    Route::get('/three_getusers', 'TestController@three_getusers')->name('test.yajra.three_getusers');
});


Route::get('sms', 'TestController@sms');
Route::get('mail', 'TestController@testmail');
Route::get('image', 'TestController@testimage');
Route::get('agentget', 'TestController@agent');
Route::get('bproduct', 'TestController@bproduct')->name('test.bproduct');
Route::get('product', 'TestController@product')->name('test.product');
Route::get('faq', 'TestController@faq')->name('test.faq');
Route::get('categories', 'TestController@categories')->name('test.categories');
Route::get('units', 'TestController@units')->name('test.units');
Route::get('permissions', 'TestController@permissions')->name('test.permissions');


Route::group(['prefix' => 'users'], function () {
    Route::get('login/{level}','TestController@loginUsers');
    Route::get('create/{level}','TestController@createUsers');
    Route::get('create/number/{number}','TestController@createUsersNumber');
});
