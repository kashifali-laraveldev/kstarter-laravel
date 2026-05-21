<?php

namespace App\Services\Admin\Acl\Roles;

use App\Libraries\Admin\Acl\Roles\AdminRolesIndexLibrary;
use App\Libraries\Admin\Acl\Roles\AdminRolesCreateLibrary;
use Illuminate\Http\Request;

class AdminRolesService
{
    protected AdminRolesIndexLibrary $adminRolesIndexLibrary;
    protected AdminRolesCreateLibrary $adminRolesCreateLibrary;

    public function __construct()
    {
        $this->adminRolesIndexLibrary = new AdminRolesIndexLibrary();
        $this->adminRolesCreateLibrary = new AdminRolesCreateLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminRolesIndexLibrary->index($request);
    }

    public function create(Request $request)
    {
        return $this->adminRolesCreateLibrary->create($request);
    }
}
