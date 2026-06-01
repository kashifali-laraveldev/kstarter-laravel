<?php

namespace App\Libraries\Admin\Acl\Roles;

use App\Validations\Roles\AdminRolesUpdateValidation;
use App\Models\RolesModel;
use App\Models\RolePermissionsModel;
use App\Models\PermissionsModel;
use Illuminate\Http\Request;

class AdminRolesUpdateLibrary
{
    protected AdminRolesUpdateValidation $validation;
    protected RolesModel $rolesModel;
    protected RolePermissionsModel $rolePermissionsModel;
    protected PermissionsModel $permissionsModel;

    public function __construct()
    {
        $this->validation           = new AdminRolesUpdateValidation();
        $this->rolesModel           = new RolesModel();
        $this->rolePermissionsModel = new RolePermissionsModel();
        $this->permissionsModel     = new PermissionsModel();
    }

    public function update(Request $request, string $encodedId)
    {
        $id     = decodeId($encodedId);
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs, $id);

        if ($error) {
            return back()->withErrors(['role_name' => $error])->withInput();
        }

        $role = $this->rolesModel->newQuery()->findOrFail($id);
        $role->update(['role_name' => $inputs['role_name']]);

        $this->rolePermissionsModel->newQuery()->where('role_id', $id)->delete();

        $permissionIds = array_map('decodeId', (array) ($inputs['permission_ids'] ?? []));
        foreach ($permissionIds as $permId) {
            if ($this->permissionsModel->newQuery()->where('id', $permId)->exists()) {
                $this->rolePermissionsModel->newQuery()->create(['role_id' => $id, 'permission_id' => $permId]);
            }
        }

        return redirect()->route('admin.roles')->with('flash_success_message', 'Role updated successfully.');
    }
}
