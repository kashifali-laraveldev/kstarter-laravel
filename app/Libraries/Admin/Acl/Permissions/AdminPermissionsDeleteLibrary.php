<?php

namespace App\Libraries\Admin\Acl\Permissions;

use App\Models\PermissionsModel;
use App\Models\RolePermissionsModel;
use Illuminate\Http\Request;

class AdminPermissionsDeleteLibrary
{
    protected PermissionsModel $permissionsModel;
    protected RolePermissionsModel $rolePermissionsModel;

    public function __construct()
    {
        $this->permissionsModel     = new PermissionsModel();
        $this->rolePermissionsModel = new RolePermissionsModel();
    }

    public function delete(Request $request, string $encodedId)
    {
        $id = decodeId($encodedId);

        $this->rolePermissionsModel->newQuery()->where('permission_id', $id)->delete();
        $this->permissionsModel->newQuery()->findOrFail($id)->delete();

        return response()->json(['status' => true, 'message' => 'Permission deleted successfully.']);
    }
}
