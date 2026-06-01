<?php

namespace App\Libraries\Admin\Acl\Roles;

use App\Models\RolesModel;
use App\Models\PermissionCategoriesModel;
use Illuminate\Http\Request;

class AdminRolesEditLibrary
{
    protected RolesModel $rolesModel;
    protected PermissionCategoriesModel $permissionCategoriesModel;

    public function __construct()
    {
        $this->rolesModel                = new RolesModel();
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function edit(Request $request, string $encodedId)
    {
        $id   = decodeId($encodedId);
        $role = $this->rolesModel->newQuery()->with('permissions')->findOrFail($id);

        $data['role']              = $role;
        $data['categories']        = $this->permissionCategoriesModel->newQuery()->with('permissions')->orderBy('display_order')->get();
        $data['rolePermissionIds'] = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit')->with($data);
    }
}
