<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

use App\Models\PermissionCategoriesModel;

class AdminPermissionCategoriesFormEditLibrary
{
    protected PermissionCategoriesModel $permissionCategoriesModel;

    public function __construct()
    {
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function formEdit(string $encodedId)
    {
        $category = $this->permissionCategoriesModel->newQuery()->findOrFail(decodeId($encodedId));
        $html = view('admin.permission-categories.partials.form_edit', ['category' => $category])->render();
        return response()->json(['html' => $html]);
    }
}
