<?php

Route::get('/','PanelController@index')->name('company.dashboard');

Route::group(['prefix'=>'ticket'],function (){

    Route::get( '', 'PanelController@ticket' )->name('company.ticket');
    Route::post('/','PanelController@saveticket');
    Route::post('count','PanelController@count_message')->name('company.ticket.count');
});
//Notification
Route::group(['prefix'=>'notification'],function ()
{
    //board
    Route::group(['prefix'=>'board'],function (){
        Route::get('/','NotificationController@index')->name('company.notification.board.index');
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
