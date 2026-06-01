<?php

namespace App\Libraries\Admin\Acl\Permissions;

use App\Models\PermissionCategoriesModel;

class AdminPermissionsFormAddLibrary
{
    protected PermissionCategoriesModel $permissionCategoriesModel;

    public function __construct()
    {
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function formAdd()
    {
        $categories = $this->permissionCategoriesModel->newQuery()->orderBy('display_order')->get();
        $html = view('admin.permissions.partials.form_add', ['categories' => $categories])->render();
        return response()->json(['html' => $html]);
    }
}
