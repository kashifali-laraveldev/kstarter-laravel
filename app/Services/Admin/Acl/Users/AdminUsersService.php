<?php

namespace App\Services\Admin\Acl\Users;

use App\Libraries\Admin\Acl\Users\AdminUsersIndexLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersFormAddLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersFormEditLibrary;
use Illuminate\Http\Request;

class AdminUsersService
{
    protected AdminUsersIndexLibrary $adminUsersIndexLibrary;
    protected AdminUsersFormAddLibrary $adminUsersFormAddLibrary;
    protected AdminUsersFormEditLibrary $adminUsersFormEditLibrary;

    public function __construct()
    {
        $this->adminUsersIndexLibrary = new AdminUsersIndexLibrary();
        $this->adminUsersFormAddLibrary = new AdminUsersFormAddLibrary();
        $this->adminUsersFormEditLibrary = new AdminUsersFormEditLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminUsersIndexLibrary->index($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminUsersFormAddLibrary->formAdd($request);
    }

    public function formEdit(Request $request, $id)
    {
        return $this->adminUsersFormEditLibrary->formEdit($request, $id);
    }
}
