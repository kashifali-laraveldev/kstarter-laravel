<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

use App\Models\PermissionCategoriesModel;
use App\Models\RolePermissionsModel;
use App\Models\PermissionsModel;
use Illuminate\Http\Request;

class AdminPermissionCategoriesDeleteLibrary
{
    protected PermissionCategoriesModel $permissionCategoriesModel;
    protected RolePermissionsModel $rolePermissionsModel;
    protected PermissionsModel $permissionsModel;

    public function __construct()
    {
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
        $this->rolePermissionsModel      = new RolePermissionsModel();
        $this->permissionsModel          = new PermissionsModel();
    }

    public function delete(Request $request, string $encodedId)
    {
        $id = decodeId($encodedId);

        $permission_ids = $this->permissionsModel->newQuery()->where('permission_category_id', $id)->pluck('permission_id')->toArray();
        if (count($permission_ids) > 0) {
            $this->rolePermissionsModel->newQuery()->whereIn('permission_id', $permission_ids)->delete();
            $this->permissionsModel->newQuery()->where('permission_category_id', $id)->delete();
        }
        $permission_ids = $this->permissionsModel->newQuery()->where('permission_category_id', $id)->pluck('permission_id')->toArray();
        $this->permissionCategoriesModel->newQuery()->findOrFail($id)->delete();

        return response()->json(['status' => true, 'message' => 'Category deleted successfully.']);
    }
}
