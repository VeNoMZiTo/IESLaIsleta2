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
                'password'       => '$2y$10$e5yiFMRmQqfT4n9HwS/zdeT9gz3ni4zafWpBF1cmqWjWJDsLPh9C.',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
