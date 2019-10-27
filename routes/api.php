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
    Route::post('equipo-directivos/media', 'EquipoDirectivoApiController@storeMedia')->name('equipo-directivos.storeMedia');
    Route::apiResource('equipo-directivos', 'EquipoDirectivoApiController');

    // Equipo Docentes
    Route::post('equipo-docentes/media', 'EquipoDocenteApiController@storeMedia')->name('equipo-docentes.storeMedia');
    Route::apiResource('equipo-docentes', 'EquipoDocenteApiController');

    // Tutoria
    Route::post('tutoria/media', 'TutoriasApiController@storeMedia')->name('tutoria.storeMedia');
    Route::apiResource('tutoria', 'TutoriasApiController');

    // Descargars
    Route::post('descargars/media', 'DescargarApiController@storeMedia')->name('descargars.storeMedia');
    Route::apiResource('descargars', 'DescargarApiController');
});
