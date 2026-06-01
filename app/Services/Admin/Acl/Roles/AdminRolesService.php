<?php

namespace App\Services\Admin\Acl\Roles;

use App\Libraries\Admin\Acl\Roles\AdminRolesIndexLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesEditLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesFormAddLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesStoreLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesUpdateLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesDeleteLibrary;
use Illuminate\Http\Request;

class AdminRolesService
{
    protected AdminRolesIndexLibrary $adminRolesIndexLibrary;
    protected AdminRolesEditLibrary $adminRolesEditLibrary;
    protected AdminRolesFormAddLibrary $adminRolesFormAddLibrary;
    protected AdminRolesStoreLibrary $adminRolesStoreLibrary;
    protected AdminRolesUpdateLibrary $adminRolesUpdateLibrary;
    protected AdminRolesDeleteLibrary $adminRolesDeleteLibrary;

    public function __construct()
    {
        $this->adminRolesIndexLibrary  = new AdminRolesIndexLibrary();
        $this->adminRolesEditLibrary   = new AdminRolesEditLibrary();
        $this->adminRolesFormAddLibrary = new AdminRolesFormAddLibrary();
        $this->adminRolesStoreLibrary  = new AdminRolesStoreLibrary();
        $this->adminRolesUpdateLibrary = new AdminRolesUpdateLibrary();
        $this->adminRolesDeleteLibrary = new AdminRolesDeleteLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminRolesIndexLibrary->index($request);
    }

    public function edit(Request $request, string $id)
    {
        return $this->adminRolesEditLibrary->edit($request, $id);
    }

    public function formAdd(Request $request)
    {
        return $this->adminRolesFormAddLibrary->formAdd($request);
    }

    public function store(Request $request)
    {
        return $this->adminRolesStoreLibrary->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->adminRolesUpdateLibrary->update($request, $id);
    }

    public function delete(Request $request, string $id)
    {
        return $this->adminRolesDeleteLibrary->delete($request, $id);
    }
}
