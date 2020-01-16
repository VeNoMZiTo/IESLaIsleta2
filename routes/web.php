<?php
Route::get('/', 'IndexController@getIndex');

Route::get('/presentacion','IndexController@getDepartamentos');
Route::get('/consejo-escolar','IndexController@getDepartamentos');
Route::get('/equipo-directivo','TablasController@getEqDirectivo');
Route::get('/equipo-docente','TablasController@getEqDocente');
Route::get('/tutorias','TablasController@getTutoria');
Route::get('/calendario-escolar', 'TablasController@getCalendario');
Route::get('/nodisponible', 'IndexController@getDepartamentos');
Route::get('/consultas', 'IndexController@getDepartamentos');
Route::get('/pincel-ekade', 'IndexController@getDepartamentos');
Route::get('/contactar/{id}', 'IndexController@getConsultas');
Route::get('/profesorado', 'IndexController@getDepartamentos');
Route::get('/oferta-educativa', 'IndexController@getDepartamentos');
Route::get('/departamentos', 'IndexController@getDepartamentos');
Route::get('/noticias', 'IndexController@getRepertorioNoticias');
Route::get('/noticia/{id}-{titulo}','IndexController@getNoticia');
Route::get('/actividad/{id}-{titulo}','IndexController@getActividad');
/*Alumnado*/
Route::get('/junta-de-delegados', 'IndexController@getDepartamentos');
Route::get('/grupos', 'TablasController@getGrupo');
Route::get('/grupo/{id}', 'TablasController@getHorario');
/*Secretaría*/
Route::get('/impresos', 'IndexController@getImpreso');
Route::get('/certificados', 'IndexController@getDepartamentos');
Route::post('mail/send-contact', 'MailController@sendCertificado');
/*Correos del Apartado de Buzón de Sugerencias*/
Route::post('mail/send-contact', 'MailController@sendContact');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeUpgradeController@index')->name('home');
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

    // Descargars
    Route::delete('descargars/destroy', 'DescargarController@massDestroy')->name('descargars.massDestroy');
    Route::post('descargars/media', 'DescargarController@storeMedia')->name('descargars.storeMedia');
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
    Route::resource('impresos', 'ImpresosController');

    // Horarios
    Route::delete('horarios/destroy', 'HorarioUpgradeController@massDestroy')->name('horarios.massDestroy');
    Route::resource('horarios', 'HorarioUpgradeController');

    // Grupos
    Route::delete('grupos/destroy', 'GruposController@massDestroy')->name('grupos.massDestroy');
    Route::resource('grupos', 'GruposController');
});
