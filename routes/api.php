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

    // Departamentos
    Route::apiResource('departamentos', 'DepartamentosApiController');

    // Equipo Directivos
    Route::apiResource('equipo-directivos', 'EquipoDirectivoApiController');

    // Equipo Docentes
    Route::apiResource('equipo-docentes', 'EquipoDocenteApiController');

    // Tutoria
    Route::apiResource('tutoria', 'TutoriasApiController');

    // Archivos
    Route::post('archivos/media', 'ArchivosApiController@storeMedia')->name('archivos.storeMedia');
    Route::apiResource('archivos', 'ArchivosApiController');
});
