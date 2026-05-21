<?php

namespace App\Libraries\Admin\Acl\Roles;

use Illuminate\Http\Request;

class AdminRolesLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $data = [];
        return view('admin.roles.index')->with($data);
    }
}
