<?php

namespace App\Services\Admin\Acl\Users;

use App\Libraries\Admin\Acl\Users\AdminUsersIndexLibrary;
use Illuminate\Http\Request;

class AdminUsersService
{
    protected AdminUsersIndexLibrary $adminUsersIndexLibrary;

    public function __construct()
    {
        $this->adminUsersIndexLibrary = new AdminUsersIndexLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminUsersIndexLibrary->index($request);
    }
}
