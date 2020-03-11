<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

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
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Noticia
    Route::delete('noticia/destroy', 'NoticiasController@massDestroy')->name('noticia.massDestroy');
    Route::post('noticia/media', 'NoticiasController@storeMedia')->name('noticia.storeMedia');
    Route::post('noticia/ckmedia', 'NoticiasController@storeCKEditorImages')->name('noticia.storeCKEditorImages');
    Route::resource('noticia', 'NoticiasController');

    // Actividades
    Route::delete('actividades/destroy', 'ActividadesController@massDestroy')->name('actividades.massDestroy');
    Route::post('actividades/media', 'ActividadesController@storeMedia')->name('actividades.storeMedia');
    Route::post('actividades/ckmedia', 'ActividadesController@storeCKEditorImages')->name('actividades.storeCKEditorImages');
    Route::resource('actividades', 'ActividadesController');

    // Equipo Directivos
    Route::delete('equipo-directivos/destroy', 'EquipoDirectivoController@massDestroy')->name('equipo-directivos.massDestroy');
    Route::resource('equipo-directivos', 'EquipoDirectivoController');

    // Equipo Docentes
    Route::delete('equipo-docentes/destroy', 'EquipoDocenteController@massDestroy')->name('equipo-docentes.massDestroy');
    Route::resource('equipo-docentes', 'EquipoDocenteController');

    // Tutoria
    Route::delete('tutoria/destroy', 'TutoriasController@massDestroy')->name('tutoria.massDestroy');
    Route::resource('tutoria', 'TutoriasController');

    // Descargars
    Route::delete('descargars/destroy', 'DescargarController@massDestroy')->name('descargars.massDestroy');
    Route::post('descargars/media', 'DescargarController@storeMedia')->name('descargars.storeMedia');
    Route::post('descargars/ckmedia', 'DescargarController@storeCKEditorImages')->name('descargars.storeCKEditorImages');
    Route::resource('descargars', 'DescargarController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Calendarios
    Route::delete('calendarios/destroy', 'CalendarioController@massDestroy')->name('calendarios.massDestroy');
    Route::resource('calendarios', 'CalendarioController');

    // Impresos
    Route::delete('impresos/destroy', 'ImpresosController@massDestroy')->name('impresos.massDestroy');
    Route::post('impresos/media', 'ImpresosController@storeMedia')->name('impresos.storeMedia');
    Route::post('impresos/ckmedia', 'ImpresosController@storeCKEditorImages')->name('impresos.storeCKEditorImages');
    Route::resource('impresos', 'ImpresosController');

    // Horarios
    Route::delete('horarios/destroy', 'HorarioController@massDestroy')->name('horarios.massDestroy');
    Route::resource('horarios', 'HorarioController');

    // Cursos
    Route::delete('cursos/destroy', 'CursosController@massDestroy')->name('cursos.massDestroy');
    Route::resource('cursos', 'CursosController');

    // Asginaturas
    Route::delete('asginaturas/destroy', 'AsginaturasController@massDestroy')->name('asginaturas.massDestroy');
    Route::resource('asginaturas', 'AsginaturasController');

    // Grupos
    Route::delete('grupos/destroy', 'GruposController@massDestroy')->name('grupos.massDestroy');
    Route::resource('grupos', 'GruposController');

    // Descagar Familia
    Route::delete('descagar-familia/destroy', 'DescagarFamiliasController@massDestroy')->name('descagar-familia.massDestroy');
    Route::post('descagar-familia/media', 'DescagarFamiliasController@storeMedia')->name('descagar-familia.storeMedia');
    Route::post('descagar-familia/ckmedia', 'DescagarFamiliasController@storeCKEditorImages')->name('descagar-familia.storeCKEditorImages');
    Route::resource('descagar-familia', 'DescagarFamiliasController');

});
