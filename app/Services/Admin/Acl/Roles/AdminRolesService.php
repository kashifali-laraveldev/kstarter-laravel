<?php

namespace App\Services\Admin\Acl\Roles;

use App\Libraries\Admin\Acl\Roles\AdminRolesIndexLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesCreateLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesEditLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesFormAddLibrary;
use Illuminate\Http\Request;

class AdminRolesService
{
    protected AdminRolesIndexLibrary $adminRolesIndexLibrary;
    protected AdminRolesCreateLibrary $adminRolesCreateLibrary;
    protected AdminRolesEditLibrary $adminRolesEditLibrary;
    protected AdminRolesFormAddLibrary $adminRolesFormAddLibrary;

    public function __construct()
    {
        $this->adminRolesIndexLibrary = new AdminRolesIndexLibrary();
        $this->adminRolesCreateLibrary = new AdminRolesCreateLibrary();
        $this->adminRolesEditLibrary = new AdminRolesEditLibrary();
        $this->adminRolesFormAddLibrary = new AdminRolesFormAddLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminRolesIndexLibrary->index($request);
    }

    public function create(Request $request)
    {
        return $this->adminRolesCreateLibrary->create($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->adminRolesEditLibrary->edit($request, $id);
    }

    public function formAdd(Request $request)
    {
        return $this->adminRolesFormAddLibrary->formAdd($request);
    }
}
