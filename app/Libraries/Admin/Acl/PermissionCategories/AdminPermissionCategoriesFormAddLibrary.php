<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

class AdminPermissionCategoriesFormAddLibrary
{
    public function __construct() {}

    public function formAdd()
    {
        $html = view('admin.permission-categories.partials.form_add')->render();
        return response()->json(['html' => $html]);
    }
}
