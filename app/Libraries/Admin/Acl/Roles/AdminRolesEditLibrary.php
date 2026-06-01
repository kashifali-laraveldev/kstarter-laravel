<?php

namespace App\Libraries\Admin\Acl\Roles;

use Illuminate\Http\Request;

class AdminRolesEditLibrary
{
    public function __construct() {}

    public function edit(Request $request, $id)
    {
        $data = ['id' => $id];
        return view('admin.roles.edit')->with($data);
    }
}
