<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '17',
                'title'      => 'slider_create',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '18',
                'title'      => 'slider_edit',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '19',
                'title'      => 'slider_show',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '20',
                'title'      => 'slider_delete',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '21',
                'title'      => 'slider_access',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '22',
                'title'      => 'noticium_create',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '23',
                'title'      => 'noticium_edit',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '24',
                'title'      => 'noticium_show',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '25',
                'title'      => 'noticium_delete',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '26',
                'title'      => 'noticium_access',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '27',
                'title'      => 'actividade_create',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '28',
                'title'      => 'actividade_edit',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '29',
                'title'      => 'actividade_show',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '30',
                'title'      => 'actividade_delete',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
            [
                'id'         => '31',
                'title'      => 'actividade_access',
                'created_at' => '2019-10-08 20:08:51',
                'updated_at' => '2019-10-08 20:08:51',
            ],
        ];

        Permission::insert($permissions);
    }
}
