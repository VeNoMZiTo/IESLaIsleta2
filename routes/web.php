<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

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

    // Sliders
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::resource('sliders', 'SliderController');

    // Noticia
    Route::delete('noticia/destroy', 'NoticiasController@massDestroy')->name('noticia.massDestroy');
    Route::post('noticia/media', 'NoticiasController@storeMedia')->name('noticia.storeMedia');
    Route::resource('noticia', 'NoticiasController');

    // Actividades
    Route::delete('actividades/destroy', 'ActividadesController@massDestroy')->name('actividades.massDestroy');
    Route::post('actividades/media', 'ActividadesController@storeMedia')->name('actividades.storeMedia');
    Route::resource('actividades', 'ActividadesController');

    // Departamentos
    Route::delete('departamentos/destroy', 'DepartamentosController@massDestroy')->name('departamentos.massDestroy');
    Route::resource('departamentos', 'DepartamentosController');

    // Equipo Directivos
    Route::delete('equipo-directivos/destroy', 'EquipoDirectivoController@massDestroy')->name('equipo-directivos.massDestroy');
    Route::resource('equipo-directivos', 'EquipoDirectivoController');

    // Equipo Docentes
    Route::delete('equipo-docentes/destroy', 'EquipoDocenteController@massDestroy')->name('equipo-docentes.massDestroy');
    Route::resource('equipo-docentes', 'EquipoDocenteController');

    // Tutoria
    Route::delete('tutoria/destroy', 'TutoriasController@massDestroy')->name('tutoria.massDestroy');
    Route::resource('tutoria', 'TutoriasController');

    // Archivos
    Route::delete('archivos/destroy', 'ArchivosController@massDestroy')->name('archivos.massDestroy');
    Route::post('archivos/media', 'ArchivosController@storeMedia')->name('archivos.storeMedia');
    Route::resource('archivos', 'ArchivosController');
});
