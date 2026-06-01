<?php

namespace App\Libraries\Admin\Dashboard;

use App\Models\PermissionCategoriesModel;
use App\Models\PermissionsModel;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use App\Models\RolesModel;

class AdminDashboardLibrary
{
    public $usersModel,
        $rolesModel,
        $permissionsModel,
        $permissionCategoriesModel;

    public function __construct()
    {
        $this->usersModel               = new UsersModel();
        $this->rolesModel               = new RolesModel();
        $this->permissionsModel         = new PermissionsModel();
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function index(Request $request)
    {
        if (!validatePermissions('admin/dashboard')) {
            return redirect('/');
        }

        $data['totalUsers']       = $this->usersModel->newQuery()->count();
        $data['totalRoles']       = $this->rolesModel->newQuery()->count();
        $data['totalPermissions'] = $this->permissionsModel->newQuery()->count();
        $data['totalCategories']  = $this->permissionCategoriesModel->newQuery()->count();

        $data['recentUsers'] = $this->usersModel->newQuery()
            ->with(['profile', 'userRoles.role'])
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard.index')->with($data);
    }
}
