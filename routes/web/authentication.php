<?php
use Illuminate\Support\Facades\Auth;

Route::get('/user/active/email/{token}','AuthController@activation')->name('activation.account');
Route::get('/choose-register','AuthController@showChooseRegistrationPage')->name('choose.register');//حقیقی یا حقوقی
Route::get('/confirm','AuthController@showConfirmForm');
// you

# Auth::routes();
Route::group([],function(){

    # login - logout
    Route::group([],function(){
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });
    # login - logout

    # register
    Route::group([],function(){
        # Registration Routes...
        Route::get('register/{level}', 'RegisterController@showRegistrationForm');
        Route::post('register', 'RegisterController@register')->name('register');
        # Registration Routes...

        # confirm register
        Route::group([],function()
        {
            Route::get('register/confirm/phone/{phone}', 'RegisterController@showConfirmRegistrationForm')->name('register.confirm.phone.get');
            Route::post('register/confirm/phone', 'RegisterController@ConfirmRegistrationForm')->name('register.confirm.phone.post');
            # ajax request
            Route::get('register/confirm/ajax/phone', 'RegisterController@RequestAjaxConfirmPhone')->name('register.confirm.ajax.phone');
        });
        # confirm register
    });
    # register

    # password
    Route::group([],function(){

        # reset
        Route::group([],function(){
            Route::get('phone/password/reset','ResetPasswordController@confirmCodePhoneGet')->name('auth.password.confirm.phone.get');
            Route::post('phone/password/reset','ResetPasswordController@confirmCodePhonePost')->name('auth.password.confirm.phone.post');
            Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.forget');
            Route::post('password/reset/post', 'ForgotPasswordController@sendResetLinkEmail')->name('password.forget.post');
            Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');
            Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
        });
        # reset

        # confirm
        Route::group([],function(){
            Route::get('password/confirm','ConfirmPasswordController@showConfirmForm')->name('password.confirm');
            Route::post('password/confirm','ConfirmPasswordController@confirm');
        });
        # confirm
    });
    # password

});
# Auth::routes();
