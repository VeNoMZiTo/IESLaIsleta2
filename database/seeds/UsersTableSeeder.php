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
                'password'       => '$2y$10$uM7slMNKUs2BF1Cm234pM.GxueJo1Dkkq9nHYME5c5ME7J2bOz/kO',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
