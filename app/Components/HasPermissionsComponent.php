<?php

namespace App\Components;

use Illuminate\Support\Facades\Route;
use App\Models\RolePermissionsModel;
use App\Models\PermissionCategoriesModel;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRolesModel;

class HasPermissionsComponent
{
    public $userRolesModel,
        $rolePermissionsModel;

    public function __construct()
    {
        $this->userRolesModel       = new UserRolesModel();
        $this->rolePermissionsModel = new RolePermissionsModel();
    }

    // Check permission based on current route URI
    public function getModulesPremissions()
    {
        $return = false;

        $currentUri  = Route::getFacadeRoot()->current()->uri();
        $adminUserId = Auth::guard('admin')->user()->id;

        $userRoles = $this->userRolesModel->newQuery()
            ->where('user_id', $adminUserId)
            ->get();

        if ($userRoles) {
            foreach ($userRoles as $userRole) {
                $result = $this->hasPermission($userRole->role_id, $currentUri);
                if ($result)
                    $return = $result;
            }
        }

        return $return;
    }

    // Check permission based on a provided slug (custom route)
    public function getModulesPremissionsBySlug($slug)
    {
        $return = false;

        $currentUri  = $slug;
        $adminUserId = Auth::guard('admin')->user()->id;

        $userRoles = $this->userRolesModel->newQuery()
            ->where('user_id', $adminUserId)
            ->get();

        if ($userRoles) {
            foreach ($userRoles as $userRole) {
                $result = $this->hasPermission($userRole->role_id, $currentUri);
                if ($result)
                    $return = $result;
            }
        }

        return $return;
    }

    // Return sidebar-visible permission categories for the current user.
    // Categories with 1 menu permission → single link; 2+ → dropdown.
    public function getDynamicSidebarData()
    {
        $adminUserId = Auth::guard('admin')->user()->id;

        $roleIds = $this->userRolesModel->newQuery()
            ->where('user_id', $adminUserId)
            ->pluck('role_id');

        if ($roleIds->isEmpty()) {
            return collect();
        }

        $permissionIds = $this->rolePermissionsModel->newQuery()
            ->whereIn('role_id', $roleIds)
            ->pluck('permission_id')
            ->unique();

        return PermissionCategoriesModel::with(['permissions' => function ($q) use ($permissionIds) {
            $q->where('show_in_menu', 1)
              ->whereIn('id', $permissionIds)
              ->orderBy('display_order');
        }])
        ->whereHas('permissions', function ($q) use ($permissionIds) {
            $q->where('show_in_menu', 1)
              ->whereIn('id', $permissionIds);
        })
        ->orderBy('display_order')
        ->get();
    }

    // Check if a specific role has permission to access a given URI
    public function hasPermission($role_id, $currentUri)
    {
        $row = $this->rolePermissionsModel->newQuery()
            ->join('ks_roles', 'ks_role_permissions.role_id', '=', 'ks_roles.id')
            ->join('ks_permissions', 'ks_role_permissions.permission_id', '=', 'ks_permissions.id')
            ->where('ks_role_permissions.role_id', $role_id)
            ->where('ks_permissions.route', $currentUri)
            ->first();

        return $row;
    }
}
