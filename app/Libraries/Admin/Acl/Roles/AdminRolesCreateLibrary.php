<?php

namespace App\Libraries\Admin\Acl\Roles;

use Illuminate\Http\Request;

class AdminRolesCreateLibrary
{
    public function __construct() {}

    public function create(Request $request)
    {
        $data = [];
        return view('admin.roles.create')->with($data);
    }
}
