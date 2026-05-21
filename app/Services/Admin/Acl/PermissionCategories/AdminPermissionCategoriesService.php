<?php

namespace App\Services\Admin\Acl\PermissionCategories;

use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesIndexLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesCreateLibrary;
use Illuminate\Http\Request;

class AdminPermissionCategoriesService
{
    protected AdminPermissionCategoriesIndexLibrary $adminPermissionCategoriesIndexLibrary;
    protected AdminPermissionCategoriesCreateLibrary $adminPermissionCategoriesCreateLibrary;

    public function __construct()
    {
        $this->adminPermissionCategoriesIndexLibrary = new AdminPermissionCategoriesIndexLibrary();
        $this->adminPermissionCategoriesCreateLibrary = new AdminPermissionCategoriesCreateLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionCategoriesIndexLibrary->index($request);
    }

    public function create(Request $request)
    {
        return $this->adminPermissionCategoriesCreateLibrary->create($request);
    }
}
