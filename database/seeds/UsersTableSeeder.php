<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$.HoqnzkHo1LPgJzdIMnjaOMgX7CsB34uwXgBzRABYEYz/AONGakYm',
                'remember_token' => null,
                'created_at'     => '2019-10-02 18:07:54',
                'updated_at'     => '2019-10-02 18:07:54',
            ],
        ];

        User::insert($users);
    }
}
