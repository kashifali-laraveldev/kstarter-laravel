<?php

namespace Database\Seeders;

use App\Models\PermissionCategoriesModel;
use Illuminate\Database\Seeder;

class PermissionCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Dashboard',             'css_class' => 'bx bx-home-alt',   'display_order' => 1],
            ['category_name' => 'Permission Categories', 'css_class' => 'bx bx-category',   'display_order' => 2],
            ['category_name' => 'Permissions',           'css_class' => 'bx bx-lock-open',  'display_order' => 3],
            ['category_name' => 'Roles',                 'css_class' => 'bx bx-shield',     'display_order' => 4],
            ['category_name' => 'Users',                 'css_class' => 'bx bx-group',      'display_order' => 5],
            ['category_name' => 'Profile',               'css_class' => 'bx bx-user-circle','display_order' => 6],
            ['category_name' => 'Logout',                'css_class' => 'bx bx-log-out',    'display_order' => 7],
        ];

        foreach ($categories as $category) {
            PermissionCategoriesModel::updateOrCreate(
                ['category_name' => $category['category_name']],
                ['css_class' => $category['css_class'], 'display_order' => $category['display_order']]
            );
        }
    }
}
