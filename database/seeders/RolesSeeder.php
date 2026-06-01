<?php

namespace Database\Seeders;

use App\Models\RolesModel;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        RolesModel::updateOrCreate(
            ['role_name' => 'Security Admin'],
            ['display_order' => 1]
        );

        RolesModel::updateOrCreate(
            ['role_name' => 'Admin'],
            ['display_order' => 2]
        );
    }
}
