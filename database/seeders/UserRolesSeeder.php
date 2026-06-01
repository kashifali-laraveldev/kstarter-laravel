<?php

namespace Database\Seeders;

use App\Models\UsersModel;
use App\Models\RolesModel;
use App\Models\UserRolesModel;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    public function run(): void
    {
        $securityAdmin = RolesModel::where('role_name', 'Security Admin')->first();
        $admin         = RolesModel::where('role_name', 'Admin')->first();

        // admin user -> Security Admin
        $adminUser = UsersModel::where('user_name', 'admin')->first();
        if ($adminUser && $securityAdmin) {
            UserRolesModel::updateOrCreate([
                'user_id' => $adminUser->id,
                'role_id' => $securityAdmin->id,
            ]);
        }

        // 10 users -> Admin role
        $adminUsernames = [
            'john.carter', 'sarah.mitchell', 'david.nguyen', 'emily.ross',
            'mark.hassan', 'lisa.fernandez', 'james.patel',  'anna.brooks',
            'kevin.wright', 'nina.scott',
        ];

        if ($admin) {
            foreach ($adminUsernames as $username) {
                $user = UsersModel::where('user_name', $username)->first();
                if ($user) {
                    UserRolesModel::updateOrCreate([
                        'user_id' => $user->id,
                        'role_id' => $admin->id,
                    ]);
                }
            }
        }
    }
}
