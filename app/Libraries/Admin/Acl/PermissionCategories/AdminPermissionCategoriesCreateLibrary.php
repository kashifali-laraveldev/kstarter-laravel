<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

use Illuminate\Http\Request;

class AdminPermissionCategoriesCreateLibrary
{
    public function __construct() {}

    public function create(Request $request)
    {
        $data = [];
        return view('admin.permission-categories.create')->with($data);
    }
}
