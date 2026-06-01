<?php

namespace App\Libraries\Admin\Acl\Permissions;

use App\Models\PermissionsModel;
use App\Models\PermissionCategoriesModel;

class AdminPermissionsFormEditLibrary
{
    protected PermissionsModel $permissionsModel;
    protected PermissionCategoriesModel $permissionCategoriesModel;

    public function __construct()
    {
        $this->permissionsModel          = new PermissionsModel();
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function formEdit(string $encodedId)
    {
        $permission = $this->permissionsModel->newQuery()->findOrFail(decodeId($encodedId));
        $categories = $this->permissionCategoriesModel->newQuery()->orderBy('display_order')->get();
        $html = view('admin.permissions.partials.form_edit', ['permission' => $permission, 'categories' => $categories])->render();
        return response()->json(['html' => $html]);
    }
}
