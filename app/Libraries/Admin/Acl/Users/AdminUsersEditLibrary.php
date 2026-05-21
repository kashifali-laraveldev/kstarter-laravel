<?php

namespace App\Libraries\Admin\Acl\Users;

use Illuminate\Http\Request;

class AdminUsersEditLibrary
{
    public function __construct() {}

    public function edit(Request $request, $id)
    {
        $data = ['id' => $id];
        return view('admin.users.edit')->with($data);
    }
}
