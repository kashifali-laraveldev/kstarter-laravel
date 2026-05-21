<?php

namespace App\Libraries\Admin\Acl\Users;

use Illuminate\Http\Request;

class AdminUsersCreateLibrary
{
    public function __construct() {}

    public function create(Request $request)
    {
        $data = [];
        return view('admin.users.create')->with($data);
    }
}
