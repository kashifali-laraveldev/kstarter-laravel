<?php

namespace App\Libraries\Admin\Acl\Roles;

use App\Validations\Roles\AdminRolesStoreValidation;
use App\Models\RolesModel;
use Illuminate\Http\Request;

class AdminRolesStoreLibrary
{
    protected AdminRolesStoreValidation $validation;
    protected RolesModel $rolesModel;

    public function __construct()
    {
        $this->validation = new AdminRolesStoreValidation();
        $this->rolesModel = new RolesModel();
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs);

        if ($error) {
            return response()->json(['status' => false, 'message' => $error]);
        }

        $this->rolesModel->newQuery()->create(['role_name' => $inputs['role_name']]);

        return response()->json(['status' => true, 'message' => 'Role created successfully.']);
    }
}
