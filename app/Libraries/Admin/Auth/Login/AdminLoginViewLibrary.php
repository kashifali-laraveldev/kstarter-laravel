<?php

namespace App\Libraries\Admin\Auth\Login;

use Illuminate\Http\Request;

class AdminLoginViewLibrary
{
    public function __construct() {}

    public function loginView(Request $request)
    {
        $data = [];
        return view('admin.auth.index')->with($data);
    }

}
