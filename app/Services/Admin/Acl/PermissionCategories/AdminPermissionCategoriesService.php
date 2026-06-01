<?php

namespace App\Services\Admin\Acl\PermissionCategories;

use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesIndexLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesCreateLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesFormAddLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesFormEditLibrary;
use Illuminate\Http\Request;

class AdminPermissionCategoriesService
{
    protected AdminPermissionCategoriesIndexLibrary $adminPermissionCategoriesIndexLibrary;
    protected AdminPermissionCategoriesCreateLibrary $adminPermissionCategoriesCreateLibrary;
    protected AdminPermissionCategoriesFormAddLibrary $adminPermissionCategoriesFormAddLibrary;
    protected AdminPermissionCategoriesFormEditLibrary $adminPermissionCategoriesFormEditLibrary;

    public function __construct()
    {
        $this->adminPermissionCategoriesIndexLibrary = new AdminPermissionCategoriesIndexLibrary();
        $this->adminPermissionCategoriesCreateLibrary = new AdminPermissionCategoriesCreateLibrary();
        $this->adminPermissionCategoriesFormAddLibrary = new AdminPermissionCategoriesFormAddLibrary();
        $this->adminPermissionCategoriesFormEditLibrary = new AdminPermissionCategoriesFormEditLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionCategoriesIndexLibrary->index($request);
    }

    public function create(Request $request)
    {
        return $this->adminPermissionCategoriesCreateLibrary->create($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminPermissionCategoriesFormAddLibrary->formAdd($request);
    }

    public function formEdit(Request $request, $id)
    {
        return $this->adminPermissionCategoriesFormEditLibrary->formEdit($request, $id);
    }
}
