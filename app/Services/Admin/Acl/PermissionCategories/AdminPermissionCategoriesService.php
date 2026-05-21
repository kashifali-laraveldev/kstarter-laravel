<?php

namespace App\Services\Admin\Acl\PermissionCategories;

use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesLibrary;
use Illuminate\Http\Request;

class AdminPermissionCategoriesService
{
    protected AdminPermissionCategoriesLibrary $adminPermissionCategoriesLibrary;
    public function __construct()
    {
        $this->adminPermissionCategoriesLibrary = new AdminPermissionCategoriesLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionCategoriesLibrary->index($request);
    }
}
