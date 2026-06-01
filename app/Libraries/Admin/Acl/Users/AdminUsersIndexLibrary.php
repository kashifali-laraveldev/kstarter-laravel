<?php

namespace App\Libraries\Admin\Acl\Users;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use App\Models\RolesModel;

class AdminUsersIndexLibrary
{
    protected UsersModel $usersModel;
    protected RolesModel $rolesModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->rolesModel = new RolesModel();
    }

    public function index(Request $request)
    {
        $authUser      = getAuthUser();
        $data['users'] = $this->usersModel->newQuery()->with(['profile', 'userRoles.role'])->where('id', '!=', $authUser->id)->orderBy('id', 'desc')->get();
        $data['roles'] = $this->rolesModel->newQuery()->orderBy('display_order')->orderBy('role_name')->get();
        return view('admin.users.index')->with($data);
    }
}
