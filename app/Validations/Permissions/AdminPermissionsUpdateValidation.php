<?php

namespace App\Validations\Permissions;

use Illuminate\Support\Facades\Validator;

class AdminPermissionsUpdateValidation
{
    public function validate(array $data): ?string
    {
        $v = Validator::make($data, [
            'permission_name'        => 'required|string|max:150',
            'permission_category_id' => 'required',
            'route'                  => 'required|string|max:200',
        ], [
            'permission_name.required'        => 'Permission name is required.',
            'permission_category_id.required' => 'Please select a category.',
            'route.required'                  => 'Route is required.',
        ]);

        return $v->fails() ? $v->errors()->first() : null;
    }
}
