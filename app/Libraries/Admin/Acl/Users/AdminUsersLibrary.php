<?php

namespace App\Libraries\Admin\Acl\Users;

use Illuminate\Http\Request;

class AdminUsersLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $data = [];
        return view('admin.users.index')->with($data);
    }
}
