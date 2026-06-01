<?php

namespace App\Libraries\Admin\Acl\Users;

use App\Models\UsersModel;
use App\Models\RolesModel;

class AdminUsersFormEditLibrary
{
    protected UsersModel $usersModel;
    protected RolesModel $rolesModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->rolesModel = new RolesModel();
    }

    public function formEdit(string $encodedId)
    {
        $id            = decodeId($encodedId);
        $user          = $this->usersModel->newQuery()->with(['profile', 'userRoles.role'])->findOrFail($id);
        $roles         = $this->rolesModel->newQuery()->orderBy('display_order')->orderBy('role_name')->get();
        $currentRoleIds = $user->userRoles->map(fn($ur) => optional($ur->role)->id)->filter()->values()->toArray();

        $html = view('admin.users.partials.form_edit', ['user' => $user, 'roles' => $roles, 'currentRoleIds' => $currentRoleIds])->render();
        return response()->json(['html' => $html]);
    }
}
