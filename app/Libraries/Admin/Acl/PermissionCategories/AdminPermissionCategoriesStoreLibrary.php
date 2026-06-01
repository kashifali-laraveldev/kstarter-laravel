<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

use App\Validations\PermissionCategories\AdminPermissionCategoriesStoreValidation;
use App\Models\PermissionCategoriesModel;
use Illuminate\Http\Request;

class AdminPermissionCategoriesStoreLibrary
{
    protected AdminPermissionCategoriesStoreValidation $validation;
    protected PermissionCategoriesModel $permissionCategoriesModel;

    public function __construct()
    {
        $this->validation                = new AdminPermissionCategoriesStoreValidation();
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs);

        if ($error) {
            return response()->json(['status' => false, 'message' => $error]);
        }

        $maxOrder = $this->permissionCategoriesModel->newQuery()->max('display_order') ?? 0;

        $this->permissionCategoriesModel->newQuery()->create([
            'category_name' => $inputs['category_name'],
            'css_class'     => $inputs['css_class'] ?? null,
            'display_order' => $maxOrder + 1,
        ]);

        return response()->json(['status' => true, 'message' => 'Category created successfully.']);
    }
}
