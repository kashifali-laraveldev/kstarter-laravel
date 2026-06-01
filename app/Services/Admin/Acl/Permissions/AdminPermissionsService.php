<?php

namespace App\Services\Admin\Acl\Permissions;

use App\Libraries\Admin\Acl\Permissions\AdminPermissionsIndexLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsCreateLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsFormAddLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsFormEditLibrary;
use Illuminate\Http\Request;

class AdminPermissionsService
{
    protected AdminPermissionsIndexLibrary $adminPermissionsIndexLibrary;
    protected AdminPermissionsCreateLibrary $adminPermissionsCreateLibrary;
    protected AdminPermissionsFormAddLibrary $adminPermissionsFormAddLibrary;
    protected AdminPermissionsFormEditLibrary $adminPermissionsFormEditLibrary;

    public function __construct()
    {
        $this->adminPermissionsIndexLibrary = new AdminPermissionsIndexLibrary();
        $this->adminPermissionsCreateLibrary = new AdminPermissionsCreateLibrary();
        $this->adminPermissionsFormAddLibrary = new AdminPermissionsFormAddLibrary();
        $this->adminPermissionsFormEditLibrary = new AdminPermissionsFormEditLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionsIndexLibrary->index($request);
    }

    public function create(Request $request)
    {
        return $this->adminPermissionsCreateLibrary->create($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminPermissionsFormAddLibrary->formAdd($request);
    }

    public function formEdit(Request $request, $id)
    {
        return $this->adminPermissionsFormEditLibrary->formEdit($request, $id);
    }
}
