<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            UserProfilesSeeder::class,
            RolesSeeder::class,
            UserRolesSeeder::class,
            PermissionCategoriesSeeder::class,
            PermissionsSeeder::class,
            RolePermissionsSeeder::class,
        ]);
    }
}
