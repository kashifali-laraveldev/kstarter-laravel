<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

use Illuminate\Http\Request;

class AdminPermissionCategoriesIndexLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $data = [];
        return view('admin.permission-categories.index')->with($data);
    }
}
