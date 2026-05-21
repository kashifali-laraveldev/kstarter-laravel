<?php

namespace App\Http\Controllers\Admin\Auth;;

use App\Services\Admin\Auth\AdminLoginService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    protected AdminLoginService $adminLoginService;
    public function __construct()
    {
        $this->adminLoginService = new AdminLoginService();
    }

    public function loginView(Request $request)
    {
        return $this->adminLoginService->loginView($request);
    }

}
