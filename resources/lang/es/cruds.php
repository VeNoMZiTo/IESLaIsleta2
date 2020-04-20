<?php

return [
    'userManagement'   => [
        'title'          => 'Gestión de usuarios',
        'title_singular' => 'Gestión de usuarios',
    ],
    'permission'       => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
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
    'role'             => [
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
    'user'             => [
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
            'team'                     => 'Team',
            'team_helper'              => '',
        ],
    ],
    'slider'           => [
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
    'noticium'         => [
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
            'archivos'           => 'Archivos',
            'archivos_helper'    => 'Si el archivo pesa mucho puede intentar comprimirlo.',
        ],
    ],
    'actividade'       => [
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
            'archivos'           => 'Archivos',
            'archivos_helper'    => 'Si el archivo pesa mucho puede intentar comprimirlo.',
        ],
    ],
    'equipoDirectivo'  => [
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
        ],
    ],
    'tutorium'         => [
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
        ],
    ],
    'descargar'        => [
        'title'          => 'Descargar/Imprimir',
        'title_singular' => 'Descargar/Imprimir',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'docente'           => 'Descargar/Imprimir - Docente',
            'docente_helper'    => 'Si el archivo pesa mucho puede intentar comprimirlo.',
            'directiva'         => 'Descargar/Imprimir - Directiva',
            'directiva_helper'  => 'Si el archivo pesa mucho puede intentar comprimirlo.',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'team'             => [
        'title'          => 'Departamentos',
        'title_singular' => 'Departamento',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'name'              => 'Name',
            'name_helper'       => '',
        ],
    ],
    'calendario'       => [
        'title'          => 'Calendario',
        'title_singular' => 'Calendario',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'tipo'              => 'Tipo de Día',
            'tipo_helper'       => '',
            'tema'              => 'Tema',
            'tema_helper'       => 'La descripción que aparecera cuando pases por encima el ratón y en el menú lateral.',
            'fecha'             => 'Fecha',
            'fecha_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'inicio'           => [
        'title'          => 'Inicio',
        'title_singular' => 'Inicio',
    ],
    'centro'           => [
        'title'          => 'Centro',
        'title_singular' => 'Centro',
    ],
    'familium'         => [
        'title'          => 'Familias',
        'title_singular' => 'Familia',
    ],
    'secretarium'      => [
        'title'          => 'Secretaría',
        'title_singular' => 'Secretaría',
    ],
    'impreso'          => [
        'title'          => 'Impresos',
        'title_singular' => 'Impreso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nombre'            => 'Nombre',
            'nombre_helper'     => '',
            'archivo'           => 'Archivo',
            'archivo_helper'    => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'estructura'       => [
        'title'          => 'Estructura del centro',
        'title_singular' => 'Estructura del centro',
    ],
    'curso'            => [
        'title'          => 'Cursos',
        'title_singular' => 'Curso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nivel'             => 'Nivel',
            'nivel_helper'      => '',
            'curso'             => 'Curso',
            'curso_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'asignatura'        => 'Asignatura',
            'asignatura_helper' => '',
        ],
    ],
    'asginatura'       => [
        'title'          => 'Asginaturas',
        'title_singular' => 'Asginatura',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'asginaturas'        => 'Asginaturas',
            'asginaturas_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'descagarFamilium' => [
        'title'          => 'Descagar/Imprimir',
        'title_singular' => 'Descagar/Imprimir',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'archivo'           => 'Descargar/imprimir - Tutorías',
            'archivo_helper'    => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'equipoDocente'    => [
        'title'          => 'Equipo Docente',
        'title_singular' => 'Equipo Docente',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'departamento'        => 'Departamento',
            'departamento_helper' => '',
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
        ],
    ],
    'profesorado'      => [
        'title'          => 'Profesorado',
        'title_singular' => 'Profesorado',
    ],
    'grupo'            => [
        'title'          => 'Grupo',
        'title_singular' => 'Grupo',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'grupo'             => 'Grupo',
            'grupo_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'team'              => 'Team',
            'team_helper'       => '',
        ],
    ],
    'archivosGrupo'    => [
        'title'          => 'Archivos - Grupos',
        'title_singular' => 'Archivos - Grupo',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'grupo'             => 'Grupo',
            'grupo_helper'      => 'Seleccione el grupo al que desea adjuntar los archivos.',
            'archivos'          => 'Archivos',
            'archivos_helper'   => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'team'              => 'Team',
            'team_helper'       => '',
        ],
    ],
];
