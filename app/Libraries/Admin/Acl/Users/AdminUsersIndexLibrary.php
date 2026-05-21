<?php

namespace App\Libraries\Admin\Acl\Users;

use Illuminate\Http\Request;

class AdminUsersIndexLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $data = [];
        return view('admin.users.index')->with($data);
    }
}
