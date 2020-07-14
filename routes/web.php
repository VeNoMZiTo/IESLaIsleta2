<?php

Route::get('/', 'IndexController@getIndex');
/*Centro*/
Route::get('/presentacion', 'IndexController@getDepartamentos');
Route::get('/equipo-directivo', 'TablasController@getEqDirectivo');
Route::get('/equipo-docente', 'TablasController@getEqDocente');
Route::get('/calendario-escolar', 'TablasController@getCalendario');
Route::get('/oferta-educativa', 'IndexController@getDepartamentos');
Route::get('/consejo-escolar', 'IndexController@getConsejoEscolar');
Route::get('/documentos-institucionales', 'IndexController@getDocumentosInstitucionales');
Route::get('/contactar/{id}', 'IndexController@getConsultas');

/*Profesorado*/
Route::get('/profesorado', 'IndexController@getDepartamentos');

/*Departamentos*/
Route::get('/departamentos', 'IndexController@getDepartamentos');
Route::get('/departamentos/{id}', 'DepartamentosController@getDepartamento');
Route::get('/departamentos/{id}/recursos', 'DepartamentosController@getCursos');
Route::post('/recursos/curso', 'DepartamentosController@getRecurso');

/*Alumnado*/
Route::get('/junta-de-delegados', 'IndexController@getJuntaDelegados');
Route::get('/redes-y-proyectos', 'IndexController@getRedesProyectos');
Route::get('/actividades-extraescolares', 'IndexController@getActividadesExtraescolares');
//Route::get('/grupos', 'TablasController@getGrupo');
//Route::get('/grupo/{id}', 'TablasController@getHorario');

/*Familias*/
Route::get('/ampa', 'IndexController@getAmpa');
Route::get('/documentos-familias', 'IndexController@getDocumentosFamilia');
Route::get('/tutorias', 'TablasController@getTutoria');

/*Secretaría*/
Route::get('/secretaria-informacion', 'IndexController@getSecretariaInformacion');
Route::get('/impresos', 'IndexController@getImpreso');
Route::get('/certificados', 'IndexController@getDepartamentos');
Route::post('mail/enviar-certificado', 'MailController@enviarCertificado');

/*Cita Previa de Tarde*/
Route::get('/cita-previa-tarde', 'IndexController@getDepartamentos');

/*General*/
Route::get('/nodisponible', 'IndexController@getDepartamentos');
Route::get('/consultas', 'IndexController@getDepartamentos');
Route::get('/pincel-ekade', 'IndexController@getDepartamentos');
Route::get('/noticias', 'IndexController@getRepertorioNoticias');
Route::get('/noticia/{id}/{noticias}', 'IndexController@getNoticia');
Route::get('/actividad/{id}/{actividad}', 'IndexController@getActividad');

/*Correos del Apartado de Buzón de Sugerencias*/
Route::post('mail/send-contact', 'MailController@sendContact');


Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeUpgradeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsuariosController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsuariosController');

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

    // Cursos
    Route::delete('cursos/destroy', 'CursosController@massDestroy')->name('cursos.massDestroy');
    Route::resource('cursos', 'CursosController');

    // Asginaturas
    Route::delete('asginaturas/destroy', 'AsginaturasController@massDestroy')->name('asginaturas.massDestroy');
    Route::resource('asginaturas', 'AsginaturasController');

    // Descagar Familia
    Route::delete('descagar-familia/destroy', 'DescagarFamiliasController@massDestroy')->name('descagar-familia.massDestroy');
    Route::post('descagar-familia/media', 'DescagarFamiliasController@storeMedia')->name('descagar-familia.storeMedia');
    Route::post('descagar-familia/ckmedia', 'DescagarFamiliasController@storeCKEditorImages')->name('descagar-familia.storeCKEditorImages');
    Route::resource('descagar-familia', 'DescagarFamiliasController');

    // Equipo Docentes
    Route::delete('equipo-docentes/destroy', 'EquipoDocenteController@massDestroy')->name('equipo-docentes.massDestroy');
    Route::resource('equipo-docentes', 'EquipoDocenteController');

    // Grupos
    Route::delete('grupos/destroy', 'GrupoController@massDestroy')->name('grupos.massDestroy');
    Route::resource('grupos', 'GrupoController');

    // Archivos Grupos
    Route::delete('archivos-grupos/destroy', 'ArchivosGruposControllerUpgrade@massDestroy')->name('archivos-grupos.massDestroy');
    Route::post('archivos-grupos/media', 'ArchivosGruposControllerUpgrade@storeMedia')->name('archivos-grupos.storeMedia');
    Route::post('archivos-grupos/ckmedia', 'ArchivosGruposControllerUpgrade@storeCKEditorImages')->name('archivos-grupos.storeCKEditorImages');
    Route::resource('archivos-grupos', 'ArchivosGruposControllerUpgrade');

    // Consejo Escolars
    Route::delete('consejo-escolars/destroy', 'ConsejoEscolarController@massDestroy')->name('consejo-escolars.massDestroy');
    Route::post('consejo-escolars/media', 'ConsejoEscolarController@storeMedia')->name('consejo-escolars.storeMedia');
    Route::post('consejo-escolars/ckmedia', 'ConsejoEscolarController@storeCKEditorImages')->name('consejo-escolars.storeCKEditorImages');
    Route::resource('consejo-escolars', 'ConsejoEscolarController');

    // Proyectos
    Route::delete('proyectos/destroy', 'ProyectosController@massDestroy')->name('proyectos.massDestroy');
    Route::post('proyectos/media', 'ProyectosController@storeMedia')->name('proyectos.storeMedia');
    Route::post('proyectos/ckmedia', 'ProyectosController@storeCKEditorImages')->name('proyectos.storeCKEditorImages');
    Route::resource('proyectos', 'ProyectosController');

    // Documentos Institucionales
    Route::delete('documentos-institucionales/destroy', 'DocumentosInstitucionalesController@massDestroy')->name('documentos-institucionales.massDestroy');
    Route::post('documentos-institucionales/media', 'DocumentosInstitucionalesController@storeMedia')->name('documentos-institucionales.storeMedia');
    Route::post('documentos-institucionales/ckmedia', 'DocumentosInstitucionalesController@storeCKEditorImages')->name('documentos-institucionales.storeCKEditorImages');
    Route::resource('documentos-institucionales', 'DocumentosInstitucionalesController');

    // Junta Delegados
    Route::delete('junta-delegados/destroy', 'JuntaDelegadoController@massDestroy')->name('junta-delegados.massDestroy');
    Route::post('junta-delegados/media', 'JuntaDelegadoController@storeMedia')->name('junta-delegados.storeMedia');
    Route::post('junta-delegados/ckmedia', 'JuntaDelegadoController@storeCKEditorImages')->name('junta-delegados.storeCKEditorImages');
    Route::resource('junta-delegados', 'JuntaDelegadoController');

    // Documentos Familia
    Route::delete('documentos-familia/destroy', 'DocumentosFamiliasController@massDestroy')->name('documentos-familia.massDestroy');
    Route::post('documentos-familia/media', 'DocumentosFamiliasController@storeMedia')->name('documentos-familia.storeMedia');
    Route::post('documentos-familia/ckmedia', 'DocumentosFamiliasController@storeCKEditorImages')->name('documentos-familia.storeCKEditorImages');
    Route::resource('documentos-familia', 'DocumentosFamiliasController');

    // Ampas
    Route::delete('ampas/destroy', 'AmpaController@massDestroy')->name('ampas.massDestroy');
    Route::post('ampas/media', 'AmpaController@storeMedia')->name('ampas.storeMedia');
    Route::post('ampas/ckmedia', 'AmpaController@storeCKEditorImages')->name('ampas.storeCKEditorImages');
    Route::resource('ampas', 'AmpaController');

    // Secretaria Informacions
    Route::delete('secretaria-informacions/destroy', 'SecretariaInformacionController@massDestroy')->name('secretaria-informacions.massDestroy');
    Route::post('secretaria-informacions/media', 'SecretariaInformacionController@storeMedia')->name('secretaria-informacions.storeMedia');
    Route::post('secretaria-informacions/ckmedia', 'SecretariaInformacionController@storeCKEditorImages')->name('secretaria-informacions.storeCKEditorImages');
    Route::resource('secretaria-informacions', 'SecretariaInformacionController');

    // Actividades Extraescolares
    Route::delete('actividades-extraescolares/destroy', 'ActividadesExtraescolaresController@massDestroy')->name('actividades-extraescolares.massDestroy');
    Route::post('actividades-extraescolares/media', 'ActividadesExtraescolaresController@storeMedia')->name('actividades-extraescolares.storeMedia');
    Route::post('actividades-extraescolares/ckmedia', 'ActividadesExtraescolaresController@storeCKEditorImages')->name('actividades-extraescolares.storeCKEditorImages');
    Route::resource('actividades-extraescolares', 'ActividadesExtraescolaresController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
