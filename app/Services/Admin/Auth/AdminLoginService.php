<?php

namespace App\Services\Admin\Auth;

use App\Libraries\Admin\Auth\Login\AdminLoginViewLibrary;
use Illuminate\Http\Request;

class AdminLoginService
{
    protected AdminLoginViewLibrary $adminLoginViewLibrary;
    public function __construct()
    {
        $this->adminLoginViewLibrary = new AdminLoginViewLibrary();
    }

    public function loginView(Request $request)
    {
        return $this->adminLoginViewLibrary->loginView($request);
    }
}
