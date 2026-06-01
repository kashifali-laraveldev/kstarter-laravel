<?php

namespace App\Services\Admin\Acl\Permissions;

use App\Libraries\Admin\Acl\Permissions\AdminPermissionsIndexLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsFormAddLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsFormEditLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsStoreLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsUpdateLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsDeleteLibrary;
use Illuminate\Http\Request;

class AdminPermissionsService
{
    protected AdminPermissionsIndexLibrary $adminPermissionsIndexLibrary;
    protected AdminPermissionsFormAddLibrary $adminPermissionsFormAddLibrary;
    protected AdminPermissionsFormEditLibrary $adminPermissionsFormEditLibrary;
    protected AdminPermissionsStoreLibrary $adminPermissionsStoreLibrary;
    protected AdminPermissionsUpdateLibrary $adminPermissionsUpdateLibrary;
    protected AdminPermissionsDeleteLibrary $adminPermissionsDeleteLibrary;

    public function __construct()
    {
        $this->adminPermissionsIndexLibrary    = new AdminPermissionsIndexLibrary();
        $this->adminPermissionsFormAddLibrary  = new AdminPermissionsFormAddLibrary();
        $this->adminPermissionsFormEditLibrary = new AdminPermissionsFormEditLibrary();
        $this->adminPermissionsStoreLibrary    = new AdminPermissionsStoreLibrary();
        $this->adminPermissionsUpdateLibrary   = new AdminPermissionsUpdateLibrary();
        $this->adminPermissionsDeleteLibrary   = new AdminPermissionsDeleteLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionsIndexLibrary->index($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminPermissionsFormAddLibrary->formAdd();
    }

    public function formEdit(Request $request, string $id)
    {
        return $this->adminPermissionsFormEditLibrary->formEdit($id);
    }

    public function store(Request $request)
    {
        return $this->adminPermissionsStoreLibrary->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->adminPermissionsUpdateLibrary->update($request, $id);
    }

    public function delete(Request $request, string $id)
    {
        return $this->adminPermissionsDeleteLibrary->delete($request, $id);
    }
}
