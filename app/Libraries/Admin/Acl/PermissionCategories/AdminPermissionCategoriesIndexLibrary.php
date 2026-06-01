<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

use App\Models\PermissionCategoriesModel;
use Illuminate\Http\Request;

class AdminPermissionCategoriesIndexLibrary
{
    protected PermissionCategoriesModel $permissionCategoriesModel;

    public function __construct()
    {
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function index(Request $request)
    {
        $data['categories'] = $this->permissionCategoriesModel->newQuery()->withCount('permissions')->orderBy('display_order')->get();
        return view('admin.permission-categories.index')->with($data);
    }
}
