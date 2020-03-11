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

    // Equipo Docentes
    Route::apiResource('equipo-docentes', 'EquipoDocenteApiController');

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

    // Horarios
    Route::apiResource('horarios', 'HorarioApiController');

    // Cursos
    Route::apiResource('cursos', 'CursosApiController');

    // Asginaturas
    Route::apiResource('asginaturas', 'AsginaturasApiController');

    // Grupos
    Route::apiResource('grupos', 'GruposApiController');

    // Descagar Familia
    Route::post('descagar-familia/media', 'DescagarFamiliasApiController@storeMedia')->name('descagar-familia.storeMedia');
    Route::apiResource('descagar-familia', 'DescagarFamiliasApiController');

});
