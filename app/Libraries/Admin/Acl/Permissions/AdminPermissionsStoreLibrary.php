<?php

namespace App\Libraries\Admin\Acl\Permissions;

use App\Validations\Permissions\AdminPermissionsStoreValidation;
use App\Models\PermissionsModel;
use Illuminate\Http\Request;

class AdminPermissionsStoreLibrary
{
    protected AdminPermissionsStoreValidation $validation;
    protected PermissionsModel $permissionsModel;

    public function __construct()
    {
        $this->validation      = new AdminPermissionsStoreValidation();
        $this->permissionsModel = new PermissionsModel();
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs);

        if ($error) {
            return response()->json(['status' => false, 'message' => $error]);
        }

        $this->permissionsModel->newQuery()->create([
            'permission_category_id' => decodeId($inputs['permission_category_id']),
            'permission_name'        => $inputs['permission_name'],
            'route'                  => $inputs['route'],
            'show_in_menu'           => !empty($inputs['show_in_menu']) ? 1 : 0,
            'css_class'              => $inputs['css_class'] ?? null,
        ]);

        return response()->json(['status' => true, 'message' => 'Permission created successfully.']);
    }
}
