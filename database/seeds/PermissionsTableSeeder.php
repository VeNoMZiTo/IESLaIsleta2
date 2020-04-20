<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'slider_create',
            ],
            [
                'id'    => '18',
                'title' => 'slider_edit',
            ],
            [
                'id'    => '19',
                'title' => 'slider_show',
            ],
            [
                'id'    => '20',
                'title' => 'slider_delete',
            ],
            [
                'id'    => '21',
                'title' => 'slider_access',
            ],
            [
                'id'    => '22',
                'title' => 'noticium_create',
            ],
            [
                'id'    => '23',
                'title' => 'noticium_edit',
            ],
            [
                'id'    => '24',
                'title' => 'noticium_show',
            ],
            [
                'id'    => '25',
                'title' => 'noticium_delete',
            ],
            [
                'id'    => '26',
                'title' => 'noticium_access',
            ],
            [
                'id'    => '27',
                'title' => 'actividade_create',
            ],
            [
                'id'    => '28',
                'title' => 'actividade_edit',
            ],
            [
                'id'    => '29',
                'title' => 'actividade_show',
            ],
            [
                'id'    => '30',
                'title' => 'actividade_delete',
            ],
            [
                'id'    => '31',
                'title' => 'actividade_access',
            ],
            [
                'id'    => '32',
                'title' => 'equipo_directivo_create',
            ],
            [
                'id'    => '33',
                'title' => 'equipo_directivo_edit',
            ],
            [
                'id'    => '34',
                'title' => 'equipo_directivo_show',
            ],
            [
                'id'    => '35',
                'title' => 'equipo_directivo_delete',
            ],
            [
                'id'    => '36',
                'title' => 'equipo_directivo_access',
            ],
            [
                'id'    => '37',
                'title' => 'tutorium_create',
            ],
            [
                'id'    => '38',
                'title' => 'tutorium_edit',
            ],
            [
                'id'    => '39',
                'title' => 'tutorium_show',
            ],
            [
                'id'    => '40',
                'title' => 'tutorium_delete',
            ],
            [
                'id'    => '41',
                'title' => 'tutorium_access',
            ],
            [
                'id'    => '42',
                'title' => 'descargar_create',
            ],
            [
                'id'    => '43',
                'title' => 'descargar_edit',
            ],
            [
                'id'    => '44',
                'title' => 'descargar_show',
            ],
            [
                'id'    => '45',
                'title' => 'descargar_delete',
            ],
            [
                'id'    => '46',
                'title' => 'descargar_access',
            ],
            [
                'id'    => '47',
                'title' => 'team_create',
            ],
            [
                'id'    => '48',
                'title' => 'team_edit',
            ],
            [
                'id'    => '49',
                'title' => 'team_show',
            ],
            [
                'id'    => '50',
                'title' => 'team_delete',
            ],
            [
                'id'    => '51',
                'title' => 'team_access',
            ],
            [
                'id'    => '52',
                'title' => 'calendario_create',
            ],
            [
                'id'    => '53',
                'title' => 'calendario_edit',
            ],
            [
                'id'    => '54',
                'title' => 'calendario_show',
            ],
            [
                'id'    => '55',
                'title' => 'calendario_delete',
            ],
            [
                'id'    => '56',
                'title' => 'calendario_access',
            ],
            [
                'id'    => '57',
                'title' => 'inicio_access',
            ],
            [
                'id'    => '58',
                'title' => 'centro_access',
            ],
            [
                'id'    => '59',
                'title' => 'familium_access',
            ],
            [
                'id'    => '60',
                'title' => 'secretarium_access',
            ],
            [
                'id'    => '61',
                'title' => 'impreso_create',
            ],
            [
                'id'    => '62',
                'title' => 'impreso_edit',
            ],
            [
                'id'    => '63',
                'title' => 'impreso_show',
            ],
            [
                'id'    => '64',
                'title' => 'impreso_delete',
            ],
            [
                'id'    => '65',
                'title' => 'impreso_access',
            ],
            [
                'id'    => '66',
                'title' => 'estructura_access',
            ],
            [
                'id'    => '67',
                'title' => 'curso_create',
            ],
            [
                'id'    => '68',
                'title' => 'curso_edit',
            ],
            [
                'id'    => '69',
                'title' => 'curso_show',
            ],
            [
                'id'    => '70',
                'title' => 'curso_delete',
            ],
            [
                'id'    => '71',
                'title' => 'curso_access',
            ],
            [
                'id'    => '72',
                'title' => 'asginatura_create',
            ],
            [
                'id'    => '73',
                'title' => 'asginatura_edit',
            ],
            [
                'id'    => '74',
                'title' => 'asginatura_show',
            ],
            [
                'id'    => '75',
                'title' => 'asginatura_delete',
            ],
            [
                'id'    => '76',
                'title' => 'asginatura_access',
            ],
            [
                'id'    => '77',
                'title' => 'descagar_familium_create',
            ],
            [
                'id'    => '78',
                'title' => 'descagar_familium_edit',
            ],
            [
                'id'    => '79',
                'title' => 'descagar_familium_show',
            ],
            [
                'id'    => '80',
                'title' => 'descagar_familium_delete',
            ],
            [
                'id'    => '81',
                'title' => 'descagar_familium_access',
            ],
            [
                'id'    => '82',
                'title' => 'equipo_docente_create',
            ],
            [
                'id'    => '83',
                'title' => 'equipo_docente_edit',
            ],
            [
                'id'    => '84',
                'title' => 'equipo_docente_show',
            ],
            [
                'id'    => '85',
                'title' => 'equipo_docente_delete',
            ],
            [
                'id'    => '86',
                'title' => 'equipo_docente_access',
            ],
            [
                'id'    => '87',
                'title' => 'profesorado_access',
            ],
            [
                'id'    => '88',
                'title' => 'grupo_create',
            ],
            [
                'id'    => '89',
                'title' => 'grupo_edit',
            ],
            [
                'id'    => '90',
                'title' => 'grupo_show',
            ],
            [
                'id'    => '91',
                'title' => 'grupo_delete',
            ],
            [
                'id'    => '92',
                'title' => 'grupo_access',
            ],
            [
                'id'    => '93',
                'title' => 'archivos_grupo_create',
            ],
            [
                'id'    => '94',
                'title' => 'archivos_grupo_edit',
            ],
            [
                'id'    => '95',
                'title' => 'archivos_grupo_show',
            ],
            [
                'id'    => '96',
                'title' => 'archivos_grupo_delete',
            ],
            [
                'id'    => '97',
                'title' => 'archivos_grupo_access',
            ],
            [
                'id'    => '98',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);

    }
}
