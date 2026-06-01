<?php

namespace App\Services\Admin\Auth;

use App\Libraries\Admin\Auth\Login\AdminLoginViewLibrary;
use App\Libraries\Admin\Auth\Login\AdminLoginPostLibrary;
use App\Libraries\Admin\Auth\Login\AdminLoginLogoutLibrary;
use Illuminate\Http\Request;

class AdminLoginService
{
    protected AdminLoginViewLibrary  $adminLoginViewLibrary;
    protected AdminLoginPostLibrary  $adminLoginPostLibrary;
    protected AdminLoginLogoutLibrary $adminLoginLogoutLibrary;

    public function __construct()
    {
        $this->adminLoginViewLibrary   = new AdminLoginViewLibrary();
        $this->adminLoginPostLibrary   = new AdminLoginPostLibrary();
        $this->adminLoginLogoutLibrary = new AdminLoginLogoutLibrary();
    }

    public function loginView(Request $request)
    {
        return $this->adminLoginViewLibrary->loginView($request);
    }

    public function login(Request $request)
    {
        return $this->adminLoginPostLibrary->login($request);
    }

    public function logout(Request $request)
    {
        return $this->adminLoginLogoutLibrary->logout($request);
    }
}
