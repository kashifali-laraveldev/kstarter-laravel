<?php

namespace App\Services\Admin\Acl\Roles;

use App\Libraries\Admin\Acl\Roles\AdminRolesLibrary;
use Illuminate\Http\Request;

class AdminRolesService
{
    protected AdminRolesLibrary $adminRolesLibrary;
    public function __construct()
    {
        $this->adminRolesLibrary = new AdminRolesLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminRolesLibrary->index($request);
    }
}
