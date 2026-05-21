<?php

namespace App\Http\Controllers\Admin\Acl\Permissions;

use App\Services\Admin\Acl\Permissions\AdminPermissionsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPermissionsController extends Controller
{
    protected AdminPermissionsService $adminPermissionsService;
    public function __construct()
    {
        $this->adminPermissionsService = new AdminPermissionsService();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionsService->index($request);
    }
}
