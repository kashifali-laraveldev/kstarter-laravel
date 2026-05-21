<?php

namespace App\Services\Admin\Acl\Permissions;

use App\Libraries\Admin\Acl\Permissions\AdminPermissionsIndexLibrary;
use App\Libraries\Admin\Acl\Permissions\AdminPermissionsCreateLibrary;
use Illuminate\Http\Request;

class AdminPermissionsService
{
    protected AdminPermissionsIndexLibrary $adminPermissionsIndexLibrary;
    protected AdminPermissionsCreateLibrary $adminPermissionsCreateLibrary;

    public function __construct()
    {
        $this->adminPermissionsIndexLibrary = new AdminPermissionsIndexLibrary();
        $this->adminPermissionsCreateLibrary = new AdminPermissionsCreateLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionsIndexLibrary->index($request);
    }

    public function create(Request $request)
    {
        return $this->adminPermissionsCreateLibrary->create($request);
    }
}
