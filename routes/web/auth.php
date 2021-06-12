<?php

# Profile
Route::group(['prefix'=>'profile','namespace'=>'App\Http\Controllers\Fathers'],function(){
    Route::get('','ProfileControllerFather@index')->name('profile.index');
    Route::get('notification-get','ProfileControllerFather@notificationGet')->name('profile.notification.get');
    Route::post('notification-post','ProfileControllerFather@notificationPost')->name('profile.notification.post');
    Route::get('session','ProfileControllerFather@sessions')->name('profile.session');
    Route::get('password-get','ProfileControllerFather@passwordGet')->name('profile.password.get');
    Route::post('password','ProfileControllerFather@passwordPost')->name('profile.password.post');
    #route forget password
    Route::get('forget-password','ProfileControllerFather@forgetPassword')->name('profile.password.forget');
});
