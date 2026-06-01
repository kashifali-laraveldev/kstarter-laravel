<?php

namespace App\Libraries\Admin\Acl\Users;

use App\Models\RolesModel;

class AdminUsersFormAddLibrary
{
    protected RolesModel $rolesModel;

    public function __construct()
    {
        $this->rolesModel = new RolesModel();
    }

    public function formAdd()
    {
        $roles = $this->rolesModel->newQuery()->orderBy('display_order')->orderBy('role_name')->get();
        $html  = view('admin.users.partials.form_add', ['roles' => $roles])->render();
        return response()->json(['html' => $html]);
    }
}
