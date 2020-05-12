<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Sliders
    Route::post('sliders/media', 'SliderApiController@storeMedia')->name('sliders.storeMedia');
    Route::apiResource('sliders', 'SliderApiController');

    // Noticia
    Route::post('noticia/media', 'NoticiasApiController@storeMedia')->name('noticia.storeMedia');
    Route::apiResource('noticia', 'NoticiasApiController');

    // Actividades
    Route::post('actividades/media', 'ActividadesApiController@storeMedia')->name('actividades.storeMedia');
    Route::apiResource('actividades', 'ActividadesApiController');

    // Equipo Directivos
    Route::apiResource('equipo-directivos', 'EquipoDirectivoApiController');

    // Tutoria
    Route::apiResource('tutoria', 'TutoriasApiController');

    // Descargars
    Route::post('descargars/media', 'DescargarApiController@storeMedia')->name('descargars.storeMedia');
    Route::apiResource('descargars', 'DescargarApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Calendarios
    Route::apiResource('calendarios', 'CalendarioApiController');

    // Impresos
    Route::post('impresos/media', 'ImpresosApiController@storeMedia')->name('impresos.storeMedia');
    Route::apiResource('impresos', 'ImpresosApiController');

    // Cursos
    Route::apiResource('cursos', 'CursosApiController');

    // Asginaturas
    Route::apiResource('asginaturas', 'AsginaturasApiController');

    // Descagar Familia
    Route::post('descagar-familia/media', 'DescagarFamiliasApiController@storeMedia')->name('descagar-familia.storeMedia');
    Route::apiResource('descagar-familia', 'DescagarFamiliasApiController');

    // Equipo Docentes
    Route::apiResource('equipo-docentes', 'EquipoDocenteApiController');

    // Grupos
    Route::apiResource('grupos', 'GrupoApiController');

    // Archivos Grupos
    Route::post('archivos-grupos/media', 'ArchivosGruposApiController@storeMedia')->name('archivos-grupos.storeMedia');
    Route::apiResource('archivos-grupos', 'ArchivosGruposApiController');

    // Consejo Escolars
    Route::post('consejo-escolars/media', 'ConsejoEscolarApiController@storeMedia')->name('consejo-escolars.storeMedia');
    Route::apiResource('consejo-escolars', 'ConsejoEscolarApiController');

    // Proyectos
    Route::post('proyectos/media', 'ProyectosApiController@storeMedia')->name('proyectos.storeMedia');
    Route::apiResource('proyectos', 'ProyectosApiController');

    // Documentos Institucionales
    Route::post('documentos-institucionales/media', 'DocumentosInstitucionalesApiController@storeMedia')->name('documentos-institucionales.storeMedia');
    Route::apiResource('documentos-institucionales', 'DocumentosInstitucionalesApiController');

    // Junta Delegados
    Route::post('junta-delegados/media', 'JuntaDelegadoApiController@storeMedia')->name('junta-delegados.storeMedia');
    Route::apiResource('junta-delegados', 'JuntaDelegadoApiController');

    // Documentos Familia
    Route::post('documentos-familia/media', 'DocumentosFamiliasApiController@storeMedia')->name('documentos-familia.storeMedia');
    Route::apiResource('documentos-familia', 'DocumentosFamiliasApiController');

    // Ampas
    Route::post('ampas/media', 'AmpaApiController@storeMedia')->name('ampas.storeMedia');
    Route::apiResource('ampas', 'AmpaApiController');

    // Secretaria Informacions
    Route::post('secretaria-informacions/media', 'SecretariaInformacionApiController@storeMedia')->name('secretaria-informacions.storeMedia');
    Route::apiResource('secretaria-informacions', 'SecretariaInformacionApiController');

    // Actividades Extraescolares
    Route::post('actividades-extraescolares/media', 'ActividadesExtraescolaresApiController@storeMedia')->name('actividades-extraescolares.storeMedia');
    Route::apiResource('actividades-extraescolares', 'ActividadesExtraescolaresApiController');
});
