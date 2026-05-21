<?php

namespace App\Services\Admin\Acl\Users;

use App\Libraries\Admin\Acl\Users\AdminUsersIndexLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersCreateLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersEditLibrary;
use Illuminate\Http\Request;

class AdminUsersService
{
    protected AdminUsersIndexLibrary $adminUsersIndexLibrary;
    protected AdminUsersCreateLibrary $adminUsersCreateLibrary;
    protected AdminUsersEditLibrary $adminUsersEditLibrary;

    public function __construct()
    {
        $this->adminUsersIndexLibrary = new AdminUsersIndexLibrary();
        $this->adminUsersCreateLibrary = new AdminUsersCreateLibrary();
        $this->adminUsersEditLibrary = new AdminUsersEditLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminUsersIndexLibrary->index($request);
    }

    public function create(Request $request)
    {
        return $this->adminUsersCreateLibrary->create($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->adminUsersEditLibrary->edit($request, $id);
    }
}
