<?php

return [
    'userManagement'  => [
        'title'          => 'Gestión de usuarios',
        'title_singular' => 'Gestión de usuarios',
    ],
    'permission'      => [
        'title'          => 'Permisos',
        'title_singular' => 'Permisos',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'            => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'            => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'slider'          => [
        'title'          => 'Slider',
        'title_singular' => 'Slider',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'titulo'             => 'Título',
            'titulo_helper'      => 'El título es la primera frase del slider.',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'descripcion'        => 'Descripción',
            'descripcion_helper' => 'Descripción breve para el slider.',
            'boton'              => 'Botón',
            'boton_helper'       => 'Es la URL del botón del slider, si no se pone, no aparecera.',
            'foto'               => 'Foto',
            'foto_helper'        => '',
        ],
    ],
    'noticium'        => [
        'title'          => 'Noticias',
        'title_singular' => 'Noticia',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'titulo'             => 'Título',
            'titulo_helper'      => '',
            'subtitulo'          => 'Subtítulo',
            'subtitulo_helper'   => '',
            'fecha'              => 'Fecha',
            'fecha_helper'       => '',
            'autor'              => 'Autor',
            'autor_helper'       => '',
            'foto'               => 'Foto',
            'foto_helper'        => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'descripcion'        => 'Descripción',
            'descripcion_helper' => '',
        ],
    ],
    'actividade'      => [
        'title'          => 'Actividades',
        'title_singular' => 'Actividade',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'titulo'             => 'Título',
            'titulo_helper'      => '',
            'fecha'              => 'Fecha',
            'fecha_helper'       => '',
            'foto'               => 'Foto',
            'foto_helper'        => '',
            'autor'              => 'Autor',
            'autor_helper'       => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'descripcion'        => 'Descripción',
            'descripcion_helper' => 'Descripción de la actividad',
        ],
    ],
    'departamento'    => [
        'title'          => 'Departamentos',
        'title_singular' => 'Departamento',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'nombre'            => 'Nombre',
            'nombre_helper'     => '',
        ],
    ],
    'equipoDirectivo' => [
        'title'          => 'Equipo Directivo',
        'title_singular' => 'Equipo Directivo',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => '',
            'cargo'                           => 'Cargo',
            'cargo_helper'                    => '',
            'nombre'                          => 'Nombre',
            'nombre_helper'                   => '',
            'email'                           => 'Email',
            'email_helper'                    => '',
            'created_at'                      => 'Created at',
            'created_at_helper'               => '',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => '',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => '',
            'abreviatura_departamento'        => 'Abreviatura del Departamento',
            'abreviatura_departamento_helper' => '',
            'departamento'                    => 'Departamento',
            'departamento_helper'             => '',
        ],
    ],
    'equipoDocente'   => [
        'title'          => 'Equipo Docente',
        'title_singular' => 'Equipo Docente',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'profesores'          => 'Profesor/a',
            'profesores_helper'   => '',
            'cargo'               => 'Cargo',
            'cargo_helper'        => '',
            'email'               => 'Email',
            'email_helper'        => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
            'departamento'        => 'Departamento',
            'departamento_helper' => '',
        ],
    ],
    'tutorium'        => [
        'title'          => 'Tutorías',
        'title_singular' => 'Tutoría',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => '',
            'nivel'                           => 'Nivel',
            'nivel_helper'                    => '',
            'grupo'                           => 'Grupo',
            'grupo_helper'                    => '',
            'tutor'                           => 'Tutor/tutora',
            'tutor_helper'                    => '',
            'email'                           => 'Email',
            'email_helper'                    => '',
            'hora_atencion'                   => 'Hora de Atención',
            'hora_atencion_helper'            => '',
            'created_at'                      => 'Created at',
            'created_at_helper'               => '',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => '',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => '',
            'abreviatura_departamento'        => 'Abreviatura del Departamento',
            'abreviatura_departamento_helper' => '',
            'departamento'                    => 'Departamento',
            'departamento_helper'             => '',
        ],
    ],
    'archivo'         => [
        'title'          => 'Archivos para Descargar/Imprimir',
        'title_singular' => 'Archivos para Descargar/Imprimir',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'docentes'          => 'Descargar/Imprimir - Docentes',
            'docentes_helper'   => 'Si el archivo pesa mucho puede intentar comprimirlo.',
            'directiva'         => 'Descargar/Imprimir - Directiva',
            'directiva_helper'  => 'Si el archivo pesa mucho puede intentar comprimirlo.',
            'tutoria'           => 'Descargar/Imprimir - Tutoría',
            'tutoria_helper'    => 'Si el archivo pesa mucho puede intentar comprimirlo.',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
];
