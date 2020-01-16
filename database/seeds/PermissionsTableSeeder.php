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
                'title' => 'departamento_create',
            ],
            [
                'id'    => '33',
                'title' => 'departamento_edit',
            ],
            [
                'id'    => '34',
                'title' => 'departamento_show',
            ],
            [
                'id'    => '35',
                'title' => 'departamento_delete',
            ],
            [
                'id'    => '36',
                'title' => 'departamento_access',
            ],
            [
                'id'    => '37',
                'title' => 'equipo_directivo_create',
            ],
            [
                'id'    => '38',
                'title' => 'equipo_directivo_edit',
            ],
            [
                'id'    => '39',
                'title' => 'equipo_directivo_show',
            ],
            [
                'id'    => '40',
                'title' => 'equipo_directivo_delete',
            ],
            [
                'id'    => '41',
                'title' => 'equipo_directivo_access',
            ],
            [
                'id'    => '42',
                'title' => 'equipo_docente_create',
            ],
            [
                'id'    => '43',
                'title' => 'equipo_docente_edit',
            ],
            [
                'id'    => '44',
                'title' => 'equipo_docente_show',
            ],
            [
                'id'    => '45',
                'title' => 'equipo_docente_delete',
            ],
            [
                'id'    => '46',
                'title' => 'equipo_docente_access',
            ],
            [
                'id'    => '47',
                'title' => 'tutorium_create',
            ],
            [
                'id'    => '48',
                'title' => 'tutorium_edit',
            ],
            [
                'id'    => '49',
                'title' => 'tutorium_show',
            ],
            [
                'id'    => '50',
                'title' => 'tutorium_delete',
            ],
            [
                'id'    => '51',
                'title' => 'tutorium_access',
            ],
            [
                'id'    => '52',
                'title' => 'descargar_create',
            ],
            [
                'id'    => '53',
                'title' => 'descargar_edit',
            ],
            [
                'id'    => '54',
                'title' => 'descargar_show',
            ],
            [
                'id'    => '55',
                'title' => 'descargar_delete',
            ],
            [
                'id'    => '56',
                'title' => 'descargar_access',
            ],
            [
                'id'    => '57',
                'title' => 'team_create',
            ],
            [
                'id'    => '58',
                'title' => 'team_edit',
            ],
            [
                'id'    => '59',
                'title' => 'team_show',
            ],
            [
                'id'    => '60',
                'title' => 'team_delete',
            ],
            [
                'id'    => '61',
                'title' => 'team_access',
            ],
            [
                'id'    => '62',
                'title' => 'calendario_create',
            ],
            [
                'id'    => '63',
                'title' => 'calendario_edit',
            ],
            [
                'id'    => '64',
                'title' => 'calendario_show',
            ],
            [
                'id'    => '65',
                'title' => 'calendario_delete',
            ],
            [
                'id'    => '66',
                'title' => 'calendario_access',
            ],
            [
                'id'    => '67',
                'title' => 'inicio_access',
            ],
            [
                'id'    => '68',
                'title' => 'centro_access',
            ],
            [
                'id'    => '69',
                'title' => 'familium_access',
            ],
            [
                'id'    => '70',
                'title' => 'secretarium_access',
            ],
            [
                'id'    => '71',
                'title' => 'impreso_create',
            ],
            [
                'id'    => '72',
                'title' => 'impreso_edit',
            ],
            [
                'id'    => '73',
                'title' => 'impreso_show',
            ],
            [
                'id'    => '74',
                'title' => 'impreso_delete',
            ],
            [
                'id'    => '75',
                'title' => 'impreso_access',
            ],
            [
                'id'    => '76',
                'title' => 'alumnado_access',
            ],
            [
                'id'    => '77',
                'title' => 'horario_create',
            ],
            [
                'id'    => '78',
                'title' => 'horario_edit',
            ],
            [
                'id'    => '79',
                'title' => 'horario_show',
            ],
            [
                'id'    => '80',
                'title' => 'horario_delete',
            ],
            [
                'id'    => '81',
                'title' => 'horario_access',
            ],
            [
                'id'    => '82',
                'title' => 'grupo_create',
            ],
            [
                'id'    => '83',
                'title' => 'grupo_edit',
            ],
            [
                'id'    => '84',
                'title' => 'grupo_show',
            ],
            [
                'id'    => '85',
                'title' => 'grupo_delete',
            ],
            [
                'id'    => '86',
                'title' => 'grupo_access',
            ],
            [
                'id'    => '87',
                'title' => 'informacion_create',
            ],
            [
                'id'    => '88',
                'title' => 'informacion_edit',
            ],
            [
                'id'    => '89',
                'title' => 'informacion_show',
            ],
            [
                'id'    => '90',
                'title' => 'informacion_delete',
            ],
            [
                'id'    => '91',
                'title' => 'informacion_access',
            ],
            [
                'id'    => '92',
                'title' => 'ampa_create',
            ],
            [
                'id'    => '93',
                'title' => 'ampa_edit',
            ],
            [
                'id'    => '94',
                'title' => 'ampa_show',
            ],
            [
                'id'    => '95',
                'title' => 'ampa_delete',
            ],
            [
                'id'    => '96',
                'title' => 'ampa_access',
            ],
            [
                'id'    => '97',
                'title' => 'documento_create',
            ],
            [
                'id'    => '98',
                'title' => 'documento_edit',
            ],
            [
                'id'    => '99',
                'title' => 'documento_show',
            ],
            [
                'id'    => '100',
                'title' => 'documento_delete',
            ],
            [
                'id'    => '101',
                'title' => 'documento_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
