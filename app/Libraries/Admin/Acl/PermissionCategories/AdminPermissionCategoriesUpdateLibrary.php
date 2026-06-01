<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

use App\Validations\PermissionCategories\AdminPermissionCategoriesUpdateValidation;
use App\Models\PermissionCategoriesModel;
use Illuminate\Http\Request;

class AdminPermissionCategoriesUpdateLibrary
{
    protected AdminPermissionCategoriesUpdateValidation $validation;
    protected PermissionCategoriesModel $permissionCategoriesModel;

    public function __construct()
    {
        $this->validation                = new AdminPermissionCategoriesUpdateValidation();
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function update(Request $request, string $encodedId)
    {
        $id     = decodeId($encodedId);
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs, $id);

        if ($error) {
            return response()->json(['status' => false, 'message' => $error]);
        }

        $this->permissionCategoriesModel->newQuery()->findOrFail($id)->update([
            'category_name' => $inputs['category_name'],
            'css_class'     => $inputs['css_class'] ?? null,
        ]);

        return response()->json(['status' => true, 'message' => 'Category updated successfully.']);
    }
}
