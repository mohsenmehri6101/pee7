<?php
//ajax
Route::group(['prefix'=>'ajax'],function (){
    Route::post('getcity','AjaxController@getCityPost')->name('ajax.get.city');

    Route::get('/getcity-edit','AjaxController@get_city_edit');//fake
    Route::get('get_bproduct','AjaxController@get_bproduct')->name('get_bproduct');//ajax
    /*Route::post('testsearch','AjaxController@testsearch')->name('ajaxSelectTest');//ajax*/
    Route::get('/show-product-all','Common\ProductController@ShowProductAll')->name('ajax.product.all');
    Route::get('/show-product-user','Common\ProductController@ShowProductUser')->name('ajax.product.user');
});
// end ajax
