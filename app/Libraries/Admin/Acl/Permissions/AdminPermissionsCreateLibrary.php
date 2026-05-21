<?php

namespace App\Libraries\Admin\Acl\Permissions;

use Illuminate\Http\Request;

class AdminPermissionsCreateLibrary
{
    public function __construct() {}

    public function create(Request $request)
    {
        $data = [];
        return view('admin.permissions.create')->with($data);
    }
}
