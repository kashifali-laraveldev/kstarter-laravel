<?php

namespace App\Services\Admin\Acl\PermissionCategories;

use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesIndexLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesFormAddLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesFormEditLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesStoreLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesUpdateLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesDeleteLibrary;
use App\Libraries\Admin\Acl\PermissionCategories\AdminPermissionCategoriesOrderLibrary;
use Illuminate\Http\Request;

class AdminPermissionCategoriesService
{
    protected AdminPermissionCategoriesIndexLibrary $adminPermissionCategoriesIndexLibrary;
    protected AdminPermissionCategoriesFormAddLibrary $adminPermissionCategoriesFormAddLibrary;
    protected AdminPermissionCategoriesFormEditLibrary $adminPermissionCategoriesFormEditLibrary;
    protected AdminPermissionCategoriesStoreLibrary $adminPermissionCategoriesStoreLibrary;
    protected AdminPermissionCategoriesUpdateLibrary $adminPermissionCategoriesUpdateLibrary;
    protected AdminPermissionCategoriesDeleteLibrary $adminPermissionCategoriesDeleteLibrary;
    protected AdminPermissionCategoriesOrderLibrary $adminPermissionCategoriesOrderLibrary;

    public function __construct()
    {
        $this->adminPermissionCategoriesIndexLibrary    = new AdminPermissionCategoriesIndexLibrary();
        $this->adminPermissionCategoriesFormAddLibrary  = new AdminPermissionCategoriesFormAddLibrary();
        $this->adminPermissionCategoriesFormEditLibrary = new AdminPermissionCategoriesFormEditLibrary();
        $this->adminPermissionCategoriesStoreLibrary    = new AdminPermissionCategoriesStoreLibrary();
        $this->adminPermissionCategoriesUpdateLibrary   = new AdminPermissionCategoriesUpdateLibrary();
        $this->adminPermissionCategoriesDeleteLibrary   = new AdminPermissionCategoriesDeleteLibrary();
        $this->adminPermissionCategoriesOrderLibrary    = new AdminPermissionCategoriesOrderLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionCategoriesIndexLibrary->index($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminPermissionCategoriesFormAddLibrary->formAdd();
    }

    public function formEdit(Request $request, string $id)
    {
        return $this->adminPermissionCategoriesFormEditLibrary->formEdit($id);
    }

    public function store(Request $request)
    {
        return $this->adminPermissionCategoriesStoreLibrary->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->adminPermissionCategoriesUpdateLibrary->update($request, $id);
    }

    public function delete(Request $request, string $id)
    {
        return $this->adminPermissionCategoriesDeleteLibrary->delete($request, $id);
    }

    public function updateOrder(Request $request, string $id)
    {
        return $this->adminPermissionCategoriesOrderLibrary->updateOrder($request, $id);
    }
}
