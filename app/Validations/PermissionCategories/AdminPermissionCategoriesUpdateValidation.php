<?php

namespace App\Validations\PermissionCategories;

use Illuminate\Support\Facades\Validator;

class AdminPermissionCategoriesUpdateValidation
{
    public function validate(array $data, int $excludeId): ?string
    {
        $v = Validator::make($data, [
            'category_name' => 'required|string|max:150|unique:ks_permission_categories,category_name,' . $excludeId,
        ], [
            'category_name.required' => 'Category name is required.',
            'category_name.unique'   => 'This category name already exists.',
        ]);

        return $v->fails() ? $v->errors()->first() : null;
    }
}
