<?php

namespace App\Services\Admin\Acl\Users;

use App\Libraries\Admin\Acl\Users\AdminUsersLibrary;
use Illuminate\Http\Request;

class AdminUsersService
{
    protected AdminUsersLibrary $adminUsersLibrary;
    public function __construct()
    {
        $this->adminUsersLibrary = new AdminUsersLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminUsersLibrary->index($request);
    }
}
