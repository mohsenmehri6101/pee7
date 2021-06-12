<?php

# dashboard
Route::get('/', 'AdminController@index')->name('admin.index');
Route::get('/postbar', 'PostBarController@postBarGet')->name('admin.postbar.get');
Route::post('/postbar', 'PostBarController@postBarPost')->name('admin.postbar.post');
# dashboard

# Profile
Route::group(['prefix'=>'profile'],function(){
    Route::get('create','ProfileController@create')->name('admin.profile.create.get');
    Route::post('create','ProfileController@store')->name('admin.profile.create.post');
    Route::get('edit','ProfileController@edit')->name('admin.profile.edit.get');
    Route::post('edit','ProfileController@update')->name('admin.profile.edit.post');
});

# notification
Route::group(['prefix'=>'notification'],function(){
    # Publicity
    Route::group(['prefix'=>'publicity'],function(){
        Route::get('/','NotificationController@notifyGet')->name('admin.notification.publicity.get');
        Route::post('/','NotificationController@notifyPost')->name('admin.notification.publicity.post');
    });
    # Publicity
});
# notification

# setting
Route::group(['prefix' => 'setting'], function () {
    Route::get('/', 'SettingController@index')->name('admin.setting.index');

# login setting
    Route::get('/login', 'SettingController@login')->name('admin.setting.login.index');
    Route::get('/login/edit', 'SettingController@login_edit')->name('admin.setting.login.edit');
    Route::post('/login/edit', 'SettingController@login_update')->name('admin.setting.login.update');

# register setting
    Route::get('/register', 'SettingController@register')->name('admin.setting.register.index');
    Route::get('/register/edit', 'SettingController@register_edit')->name('admin.setting.register.edit');
    Route::post('/register/edit', 'SettingController@register_update')->name('admin.setting.register.update');
    Route::get('/', 'SettingController@index')->name('admin.setting.index');

# web
    Route::group(['prefix' => 'web'], function () {
        Route::get('/', 'WebsiteController@index')->name('admin.setting.web.index');
        Route::get('/edit', 'WebsiteController@edit')->name('admin.setting.web.edit');
        Route::post('/edit', 'WebsiteController@update')->name('admin.setting.web.update');
    });

# notes
    Route::group(['prefix' => 'notes'], function () {
        Route::get('/index', 'NoteController@index')->name('admin.setting.note.index');
        Route::get('/status', 'NoteController@status')->name('admin.setting.note.status');
        Route::get('/create', 'NoteController@create')->name('admin.setting.note.create');
        Route::post('/store', 'NoteController@store')->name('admin.setting.note.store');
        Route::get('/show/{note}', 'NoteController@show')->name('admin.setting.note.show');
        Route::get('/edit/{note}', 'NoteController@edit')->name('admin.setting.note.edit');
        Route::post('/update', 'NoteController@update')->name('admin.setting.note.update');
        Route::delete('/destroy', 'NoteController@destroy')->name('admin.setting.note.destroy');
    });

# faq
    Route::group(['prefix' => 'faq'], function () {
        Route::get('/index', 'FaqController@index')->name('admin.setting.faq.index');
        Route::get('/status', 'FaqController@status')->name('admin.setting.faq.status');
        Route::get('/create', 'FaqController@create')->name('admin.setting.faq.create');
        Route::post('/store', 'FaqController@store')->name('admin.setting.faq.store');
        Route::get('/edit/{faq}', 'FaqController@edit')->name('admin.setting.faq.edit');
        Route::post('/update', 'FaqController@update')->name('admin.setting.faq.update');
        Route::delete('/destroy', 'FaqController@destroy')->name('admin.setting.faq.destroy');
    });
});
# setting

# bProduct
Route::group(['prefix' => 'bproduct'], function () {
    Route::get('/index', 'BaseProductController@index')->name('admin.bproduct.index');
    Route::get('/create', 'BaseProductController@create')->name('admin.bproduct.create');
    Route::post('/store', 'BaseProductController@store')->name('admin.bproduct.store');
    Route::get('/edit/{bproduct}', 'BaseProductController@edit')->name('admin.bproduct.edit');
    Route::get('/show', 'BaseProductController@show')->name('admin.bproduct.show');
    Route::post('/update', 'BaseProductController@update')->name('admin.bproduct.update');
    Route::delete('/destroy', 'BaseProductController@destroy')->name('admin.bproduct.destroy');
});

# users
Route::group(['prefix' => 'users'], function () {
    # define sub-admin-user
    Route::get('create-admin','UserController@createAdminGet')->name('admin.users.create.admin');
    Route::post('create-admin','UserController@createAdminPost')->name('admin.users.create.admin');
    #
    Route::get('all-users', 'UserController@index')->name('admin.users.index');
    Route::get('all', 'UserController@all')->name('admin.users.all');
    Route::get('suppliers', 'UserController@suppliers')->name('admin.users.suppliers');
    Route::get('companies', 'UserController@companies')->name('admin.users.companies');
    Route::get('persons', 'UserController@persons')->name('admin.users.persons');
    Route::get('clerks', 'UserController@clerks')->name('admin.users.clerks');
    Route::get('admins', 'UserController@admins')->name('admin.users.admins');
    # order
    Route::get('/block/{user}','UserController@block')->name('admin.users.block');
    Route::get('/show/{user}','UserController@show')->name('admin.users.show');
    # sub admin
    Route::group(['prefix'=>'sub-admin'],function(){
        Route::get('create','UserController@createAdminGet')->name('admin.users.sub.create.admin');
        Route::post('create','UserController@createAdminPost')->name('admin.users.sub.create.admin.post');
    });
    # sub supplier
    Route::group(['prefix'=>'sub-supplier'],function(){
        Route::get('create','UserController@createSupplierGet')->name('admin.users.sub.create.supplier');
        Route::post('create','UserController@createSupplierPost')->name('admin.users.sub.create.supplier.post');
    });

# ajax
    Route::get('in-table', 'UserController@inTable')->name('admin.users.table');
});
# users

Route::get('/product', 'AdminController@product');
Route::get('peoples', 'AdminController@peoples');
Route::get('searchpersons', 'AdminController@searchpersons');
Route::get('searchcompanies', 'AdminController@searchcompanies');
Route::get('unit', 'AdminController@showunit');
Route::get('getunit', 'AdminController@getunit');
Route::post('insertunit', 'AdminController@insertunit');
Route::get('insertcategories', 'AdminController@insertcategories');
Route::post('categories', 'AdminController@savecategories');
Route::get('categories', 'AdminController@showcategories');
Route::get('searchcategories', 'AdminController@searchcategories');

Route::group(['prefix' => 'ticket'], function () {
    Route::get('/count', 'TicketController@count')->name('admin.ticket.count');
    Route::get('/', 'TicketController@ticket')->name("admin.ticket.index");
    Route::get('/save', 'TicketController@save_ticket')->name('admin.ticket.save');
    Route::get('/single', 'TicketController@single_ticket')->name('admin.ticket.single');
    Route::get('/delete', 'TicketController@delete_ticket')->name('admin.ticket.delete');
    Route::get('/search', 'TicketController@search_ticket')->name('admin.ticket.search');
    Route::get('/ban', 'TicketController@ban_user')->name('admin.ticket.ban');
});
