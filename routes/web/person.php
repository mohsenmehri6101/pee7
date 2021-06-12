<?php

Route::get('/','PanelController@index')->name('person.dashboard');

Route::group(['prefix'=>'ticket'],function () {

    Route::get('/','PanelController@ticket')->name('person.ticket');
    Route::post('/','PanelController@saveticket');
    Route::post('/count','PanelController@count_message')->name('person.ticket.count');
});
