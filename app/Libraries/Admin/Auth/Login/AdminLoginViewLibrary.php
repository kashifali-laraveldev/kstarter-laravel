<?php

namespace App\Libraries\Admin\Auth\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginViewLibrary
{
    public function __construct() {}

    public function loginView(Request $request)
    {
        return view('admin.auth.index');
    }
}
