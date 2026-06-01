<?php

namespace App\Libraries\Admin\Acl\Roles;

use App\Models\RolesModel;
use Illuminate\Http\Request;

class AdminRolesIndexLibrary
{
    protected RolesModel $rolesModel;

    public function __construct()
    {
        $this->rolesModel = new RolesModel();
    }

    public function index(Request $request)
    {
        $data['roles'] = $this->rolesModel->newQuery()->withCount('permissions')->orderBy('display_order')->orderBy('role_name')->get();
        return view('admin.roles.index')->with($data);
    }
}
