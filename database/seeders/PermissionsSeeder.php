<?php

namespace Database\Seeders;

use App\Models\PermissionCategoriesModel;
use App\Models\PermissionsModel;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $map = [
            'Dashboard' => [
                ['permission_name' => 'Dashboard',                          'route' => 'admin/dashboard',                              'show_in_menu' => 1, 'css_class' => 'bx bx-home-alt',   'display_order' => 1],
            ],
            'Users' => [
                ['permission_name' => 'Users',                              'route' => 'admin/users',                                  'show_in_menu' => 1, 'css_class' => 'bx bx-group',       'display_order' => 1],
                ['permission_name' => 'Add User',                           'route' => 'admin/users/form/add',                         'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 2],
                ['permission_name' => 'Edit User',                          'route' => 'admin/users/form/edit/{id}',                   'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 3],
                ['permission_name' => 'Store User',                         'route' => 'admin/users/store',                            'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 4],
                ['permission_name' => 'Update User',                        'route' => 'admin/users/update/{id}',                      'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 5],
                ['permission_name' => 'Delete User',                        'route' => 'admin/users/delete/{id}',                      'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 6],
                ['permission_name' => 'Toggle User Status',                 'route' => 'admin/users/toggle-status/{id}',               'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 7],
            ],
            'Roles' => [
                ['permission_name' => 'Roles',                              'route' => 'admin/roles',                                  'show_in_menu' => 1, 'css_class' => 'bx bx-shield',      'display_order' => 1],
                ['permission_name' => 'Create Role',                        'route' => 'admin/roles/create',                           'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 2],
                ['permission_name' => 'Edit Role',                          'route' => 'admin/roles/edit/{id}',                        'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 3],
                ['permission_name' => 'Add Role',                           'route' => 'admin/roles/form/add',                         'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 4],
                ['permission_name' => 'Store Role',                         'route' => 'admin/roles/store',                            'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 5],
                ['permission_name' => 'Update Role',                        'route' => 'admin/roles/update/{id}',                      'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 6],
                ['permission_name' => 'Delete Role',                        'route' => 'admin/roles/delete/{id}',                      'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 7],
            ],
            'Permissions' => [
                ['permission_name' => 'Permissions',                        'route' => 'admin/permissions',                            'show_in_menu' => 1, 'css_class' => 'bx bx-lock-open',   'display_order' => 1],
                ['permission_name' => 'Create Permission',                  'route' => 'admin/permissions/create',                     'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 2],
                ['permission_name' => 'Add Permission',                      'route' => 'admin/permissions/form/add',                   'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 3],
                ['permission_name' => 'Edit Permission',                    'route' => 'admin/permissions/form/edit/{id}',             'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 4],
                ['permission_name' => 'Store Permission',                   'route' => 'admin/permissions/store',                      'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 5],
                ['permission_name' => 'Update Permission',                  'route' => 'admin/permissions/update/{id}',                'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 6],
                ['permission_name' => 'Delete Permission',                  'route' => 'admin/permissions/delete/{id}',                'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 7],
            ],
            'Permission Categories' => [
                ['permission_name' => 'Permission Categories',              'route' => 'admin/permission-categories',                  'show_in_menu' => 1, 'css_class' => 'bx bx-category',    'display_order' => 1],
                ['permission_name' => 'Create Permission Category',         'route' => 'admin/permission-categories/create',           'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 2],
                ['permission_name' => 'Add Permission Category',            'route' => 'admin/permission-categories/form/add',         'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 3],
                ['permission_name' => 'Edit Permission Category',           'route' => 'admin/permission-categories/form/edit/{id}',   'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 4],
                ['permission_name' => 'Store Permission Category',          'route' => 'admin/permission-categories/store',            'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 5],
                ['permission_name' => 'Update Permission Category',         'route' => 'admin/permission-categories/update/{id}',      'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 6],
                ['permission_name' => 'Delete Permission Category',         'route' => 'admin/permission-categories/delete/{id}',      'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 7],
                ['permission_name' => 'Update Permission Category Order',   'route' => 'admin/permission-categories/order/{id}',       'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 8],
            ],
            'Profile' => [
                ['permission_name' => 'Profile',                            'route' => 'admin/profile',                                'show_in_menu' => 1, 'css_class' => 'bx bx-user-circle', 'display_order' => 1],
                ['permission_name' => 'Update Profile',                     'route' => 'admin/profile/update',                         'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 2],
                ['permission_name' => 'Change Password',                    'route' => 'admin/profile/change-password',                'show_in_menu' => 0, 'css_class' => '',                   'display_order' => 3],
            ],
            'Logout' => [
                ['permission_name' => 'Logout',                             'route' => 'admin/logout',                                 'show_in_menu' => 1, 'css_class' => 'bx bx-log-out',     'display_order' => 1],
            ],
        ];

        foreach ($map as $categoryName => $permissions) {
            $category = PermissionCategoriesModel::where('category_name', $categoryName)->first();

            if (!$category) continue;

            foreach ($permissions as $permission) {
                PermissionsModel::updateOrCreate(
                    ['route' => $permission['route']],
                    [
                        'permission_category_id' => $category->id,
                        'permission_name'        => $permission['permission_name'],
                        'show_in_menu'           => $permission['show_in_menu'],
                        'css_class'              => $permission['css_class'],
                        'display_order'          => $permission['display_order'],
                    ]
                );
            }
        }

        // Fix old 'admin/roles/{id}/edit' route if it was previously seeded
        PermissionsModel::where('route', 'admin/roles/{id}/edit')
            ->update(['route' => 'admin/roles/edit/{id}', 'permission_name' => 'Edit Role']);
    }
}
