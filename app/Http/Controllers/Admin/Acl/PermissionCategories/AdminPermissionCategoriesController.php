<?php

namespace App\Http\Controllers\Admin\Acl\PermissionCategories;

use App\Services\Admin\Acl\PermissionCategories\AdminPermissionCategoriesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPermissionCategoriesController extends Controller
{
    protected AdminPermissionCategoriesService $adminPermissionCategoriesService;
    public function __construct()
    {
        $this->adminPermissionCategoriesService = new AdminPermissionCategoriesService();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionCategoriesService->index($request);
    }
}
