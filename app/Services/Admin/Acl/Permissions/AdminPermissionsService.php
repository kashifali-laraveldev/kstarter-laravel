<?php

namespace App\Services\Admin\Acl\Permissions;

use App\Libraries\Admin\Acl\Permissions\AdminPermissionsLibrary;
use Illuminate\Http\Request;

class AdminPermissionsService
{
    protected AdminPermissionsLibrary $adminPermissionsLibrary;
    public function __construct()
    {
        $this->adminPermissionsLibrary = new AdminPermissionsLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionsLibrary->index($request);
    }
}
