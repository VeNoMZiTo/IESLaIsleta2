<?php
Route::get('/', 'IndexController@getIndex');
Route::get('/equipo-directivo','TablasController@getEqDirectivo');
Route::get('/equipo-docente','TablasController@getEqDocente');
Route::get('/tutorias','TablasController@getTutoria');
Route::get('/nodisponible', function () {
    return view('frontend.nodisponible');
});
Route::get('/calendario-escolar', function () {
    return view('frontend.calendarioescolar');
});
Route::get('/consultas', function () {
    return view('frontend.consultas');
});
Route::get('/profesorado', function () {
    return view('frontend.profesorado');
});
Route::get('/noticias', 'IndexController@getRepertorioNoticias');
Route::get('/noticia/{id}-{titulo}','IndexController@getNoticia');
Route::get('/actividad/{id}-{titulo}','IndexController@getActividad');
Route::post('mail/send-contact', 'MailController@sendContact');
//Route::redirect('/', '/login');
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
    Route::post('equipo-directivos/media', 'EquipoDirectivoController@storeMedia')->name('equipo-directivos.storeMedia');
    Route::resource('equipo-directivos', 'EquipoDirectivoController');

    // Equipo Docentes
    Route::delete('equipo-docentes/destroy', 'EquipoDocenteController@massDestroy')->name('equipo-docentes.massDestroy');
    Route::post('equipo-docentes/media', 'EquipoDocenteController@storeMedia')->name('equipo-docentes.storeMedia');
    Route::resource('equipo-docentes', 'EquipoDocenteController');

    // Tutoria
    Route::delete('tutoria/destroy', 'TutoriasController@massDestroy')->name('tutoria.massDestroy');
    Route::post('tutoria/media', 'TutoriasController@storeMedia')->name('tutoria.storeMedia');
    Route::resource('tutoria', 'TutoriasController');

    // Descargars
    Route::delete('descargars/destroy', 'DescargarController@massDestroy')->name('descargars.massDestroy');
    Route::post('descargars/media', 'DescargarController@storeMedia')->name('descargars.storeMedia');
    Route::resource('descargars', 'DescargarController');
});
