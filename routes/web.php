<?php

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/consultas', function () {
    return view('frontend.consultas');
});
Route::get('/profesorado', function () {
    return view('frontend.profesorado');
});
Route::get('/noticias', function () {
    return view('frontend.noticias');
});
Route::get('/unoticias', function () {
    return view('frontend.unoticias');
});
Route::post('mail/send-contact', 'MailController@sendContact');

//Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
});
