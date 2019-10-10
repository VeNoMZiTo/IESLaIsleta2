<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2019-10-10 05:26:49',
                'updated_at' => '2019-10-10 05:26:49',
            ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2019-10-10 05:26:49',
                'updated_at' => '2019-10-10 05:26:49',
            ],
        ];

        Role::insert($roles);
    }
}
