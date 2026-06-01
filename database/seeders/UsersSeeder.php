<?php

namespace Database\Seeders;

use App\Models\UsersModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        UsersModel::updateOrCreate(
            ['user_name' => 'admin'],
            [
                'password'  => Hash::make('admin'),
                'is_active' => 1,
            ]
        );

        $adminUsers = [
            ['user_name' => 'john.carter',   'password' => 'password'],
            ['user_name' => 'sarah.mitchell', 'password' => 'password'],
            ['user_name' => 'david.nguyen',   'password' => 'password'],
            ['user_name' => 'emily.ross',     'password' => 'password'],
            ['user_name' => 'mark.hassan',    'password' => 'password'],
            ['user_name' => 'lisa.fernandez', 'password' => 'password'],
            ['user_name' => 'james.patel',    'password' => 'password'],
            ['user_name' => 'anna.brooks',    'password' => 'password'],
            ['user_name' => 'kevin.wright',   'password' => 'password'],
            ['user_name' => 'nina.scott',     'password' => 'password'],
        ];

        foreach ($adminUsers as $userData) {
            UsersModel::updateOrCreate(
                ['user_name' => $userData['user_name']],
                [
                    'password'  => Hash::make($userData['password']),
                    'is_active' => 1,
                ]
            );
        }
    }
}
