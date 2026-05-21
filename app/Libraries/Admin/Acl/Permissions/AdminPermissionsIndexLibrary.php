<?php

namespace App\Libraries\Admin\Acl\Permissions;

use Illuminate\Http\Request;

class AdminPermissionsIndexLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $data = [];
        return view('admin.permissions.index')->with($data);
    }
}
