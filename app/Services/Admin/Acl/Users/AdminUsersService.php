<?php

namespace App\Services\Admin\Acl\Users;

use App\Libraries\Admin\Acl\Users\AdminUsersIndexLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersFormAddLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersFormEditLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersStoreLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersUpdateLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersDeleteLibrary;
use App\Libraries\Admin\Acl\Users\AdminUsersToggleStatusLibrary;
use Illuminate\Http\Request;

class AdminUsersService
{
    protected AdminUsersIndexLibrary $adminUsersIndexLibrary;
    protected AdminUsersFormAddLibrary $adminUsersFormAddLibrary;
    protected AdminUsersFormEditLibrary $adminUsersFormEditLibrary;
    protected AdminUsersStoreLibrary $adminUsersStoreLibrary;
    protected AdminUsersUpdateLibrary $adminUsersUpdateLibrary;
    protected AdminUsersDeleteLibrary $adminUsersDeleteLibrary;
    protected AdminUsersToggleStatusLibrary $adminUsersToggleStatusLibrary;

    public function __construct()
    {
        $this->adminUsersIndexLibrary        = new AdminUsersIndexLibrary();
        $this->adminUsersFormAddLibrary      = new AdminUsersFormAddLibrary();
        $this->adminUsersFormEditLibrary     = new AdminUsersFormEditLibrary();
        $this->adminUsersStoreLibrary        = new AdminUsersStoreLibrary();
        $this->adminUsersUpdateLibrary       = new AdminUsersUpdateLibrary();
        $this->adminUsersDeleteLibrary       = new AdminUsersDeleteLibrary();
        $this->adminUsersToggleStatusLibrary = new AdminUsersToggleStatusLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminUsersIndexLibrary->index($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminUsersFormAddLibrary->formAdd();
    }

    public function formEdit(Request $request, string $id)
    {
        return $this->adminUsersFormEditLibrary->formEdit($id);
    }

    public function store(Request $request)
    {
        return $this->adminUsersStoreLibrary->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->adminUsersUpdateLibrary->update($request, $id);
    }

    public function delete(Request $request, string $id)
    {
        return $this->adminUsersDeleteLibrary->delete($request, $id);
    }

    public function toggleStatus(Request $request, string $id)
    {
        return $this->adminUsersToggleStatusLibrary->toggleStatus($request, $id);
    }
}
