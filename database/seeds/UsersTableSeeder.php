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
                'password'       => '$2y$10$ojUCDN7vnEN.oYtuwA4EaOJADsO1nWFqt94y.Bpb/sfluUwfB0SFy',
                'remember_token' => null,
                'created_at'     => '2019-10-10 05:26:49',
                'updated_at'     => '2019-10-10 05:26:49',
            ],
        ];

        User::insert($users);
    }
}
