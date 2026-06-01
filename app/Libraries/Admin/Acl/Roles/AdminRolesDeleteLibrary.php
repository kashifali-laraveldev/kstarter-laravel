<?php

namespace App\Libraries\Admin\Acl\Roles;

use App\Models\RolesModel;
use App\Models\RolePermissionsModel;
use App\Models\UserRolesModel;
use Illuminate\Http\Request;

class AdminRolesDeleteLibrary
{
    protected RolesModel $rolesModel;
    protected RolePermissionsModel $rolePermissionsModel;
    protected UserRolesModel $userRolesModel;

    public function __construct()
    {
        $this->rolesModel           = new RolesModel();
        $this->rolePermissionsModel = new RolePermissionsModel();
        $this->userRolesModel       = new UserRolesModel();
    }

    public function delete(Request $request, string $encodedId)
    {
        $id = decodeId($encodedId);

        if ($id === 1) {
            return response()->json(['status' => false, 'message' => 'The default system role is protected and cannot be deleted.']);
        }

        $this->rolePermissionsModel->newQuery()->where('role_id', $id)->delete();
        $this->userRolesModel->newQuery()->where('role_id', $id)->delete();
        $this->rolesModel->newQuery()->findOrFail($id)->delete();

        return response()->json(['status' => true, 'message' => 'Role deleted successfully.']);
    }
}
