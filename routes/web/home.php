<?php

Route::get ( '/', 'HomeController@index' )->name('home.index');
Route::get ( '/note/{id}', 'HomeController@note' )->name('home.note');
Route::get ( '/faq', 'HomeController@faq' )->name('home.faq');
