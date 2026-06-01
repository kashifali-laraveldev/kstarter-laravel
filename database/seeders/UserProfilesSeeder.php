<?php

namespace Database\Seeders;

use App\Models\UserProfilesModel;
use Illuminate\Database\Seeder;

class UserProfilesSeeder extends Seeder
{
    public function run(): void
    {
        UserProfilesModel::updateOrCreate(
            ['user_name' => 'admin'],
            [
                'first_name'       => 'Security',
                'last_name'        => 'Admin',
                'email_address'    => 'admin@kstarter.com',
                'mobile_number'    => '+92 300 0000000',
                'department_name'  => 'IT',
                'designation_name' => 'System Administrator',
                'country'          => 'Pakistan',
            ]
        );

        $profiles = [
            ['user_name' => 'john.carter',    'first_name' => 'John',   'last_name' => 'Carter',    'email_address' => 'john.carter@kstarter.com',    'mobile_number' => '+92 300 1000001', 'department_name' => 'IT'],
            ['user_name' => 'sarah.mitchell',  'first_name' => 'Sarah',  'last_name' => 'Mitchell',  'email_address' => 'sarah.mitchell@kstarter.com',  'mobile_number' => '+92 300 1000002', 'department_name' => 'HR'],
            ['user_name' => 'david.nguyen',    'first_name' => 'David',  'last_name' => 'Nguyen',    'email_address' => 'david.nguyen@kstarter.com',    'mobile_number' => '+92 300 1000003', 'department_name' => 'Finance'],
            ['user_name' => 'emily.ross',      'first_name' => 'Emily',  'last_name' => 'Ross',      'email_address' => 'emily.ross@kstarter.com',      'mobile_number' => '+92 300 1000004', 'department_name' => 'Marketing'],
            ['user_name' => 'mark.hassan',     'first_name' => 'Mark',   'last_name' => 'Hassan',    'email_address' => 'mark.hassan@kstarter.com',     'mobile_number' => '+92 300 1000005', 'department_name' => 'Operations'],
            ['user_name' => 'lisa.fernandez',  'first_name' => 'Lisa',   'last_name' => 'Fernandez', 'email_address' => 'lisa.fernandez@kstarter.com',  'mobile_number' => '+92 300 1000006', 'department_name' => 'IT'],
            ['user_name' => 'james.patel',     'first_name' => 'James',  'last_name' => 'Patel',     'email_address' => 'james.patel@kstarter.com',     'mobile_number' => '+92 300 1000007', 'department_name' => 'Engineering'],
            ['user_name' => 'anna.brooks',     'first_name' => 'Anna',   'last_name' => 'Brooks',    'email_address' => 'anna.brooks@kstarter.com',     'mobile_number' => '+92 300 1000008', 'department_name' => 'HR'],
            ['user_name' => 'kevin.wright',    'first_name' => 'Kevin',  'last_name' => 'Wright',    'email_address' => 'kevin.wright@kstarter.com',    'mobile_number' => '+92 300 1000009', 'department_name' => 'Finance'],
            ['user_name' => 'nina.scott',      'first_name' => 'Nina',   'last_name' => 'Scott',     'email_address' => 'nina.scott@kstarter.com',      'mobile_number' => '+92 300 1000010', 'department_name' => 'Marketing'],
        ];

        foreach ($profiles as $profile) {
            UserProfilesModel::updateOrCreate(
                ['user_name' => $profile['user_name']],
                [
                    'first_name'      => $profile['first_name'],
                    'last_name'       => $profile['last_name'],
                    'email_address'   => $profile['email_address'],
                    'mobile_number'   => $profile['mobile_number'],
                    'department_name' => $profile['department_name'],
                ]
            );
        }
    }
}
