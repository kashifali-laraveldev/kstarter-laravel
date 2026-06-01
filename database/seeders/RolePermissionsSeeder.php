<?php

namespace Database\Seeders;

use App\Models\RolesModel;
use App\Models\PermissionsModel;
use App\Models\RolePermissionsModel;
use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = PermissionsModel::all();

        $roles = ['Security Admin', 'Admin'];

        foreach ($roles as $roleName) {
            $role = RolesModel::where('role_name', $roleName)->first();

            if (!$role) continue;

            foreach ($permissions as $permission) {
                RolePermissionsModel::firstOrCreate([
                    'role_id'       => $role->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }
    }
}
