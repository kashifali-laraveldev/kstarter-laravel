<?php

namespace App\Http\Controllers\Admin\Acl\Users;

use App\Services\Admin\Acl\Users\AdminUsersService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    protected AdminUsersService $adminUsersService;
    public function __construct()
    {
        $this->adminUsersService = new AdminUsersService();
    }

    public function index(Request $request)
    {
        return $this->adminUsersService->index($request);
    }
}
