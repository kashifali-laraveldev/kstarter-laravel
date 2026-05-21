<?php

namespace App\Http\Controllers\Admin\Acl\Roles;

use App\Services\Admin\Acl\Roles\AdminRolesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRolesController extends Controller
{
    protected AdminRolesService $adminRolesService;

    public function __construct()
    {
        $this->adminRolesService = new AdminRolesService();
    }

    public function index(Request $request)
    {
        return $this->adminRolesService->index($request);
    }

    public function create(Request $request)
    {
        return $this->adminRolesService->create($request);
    }
}
