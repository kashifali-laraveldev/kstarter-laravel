<?php

namespace App\Validations\Roles;

use Illuminate\Support\Facades\Validator;

class AdminRolesUpdateValidation
{
    public function validate(array $data, int $excludeId): ?string
    {
        $v = Validator::make($data, [
            'role_name' => 'required|string|max:100|unique:ks_roles,role_name,' . $excludeId,
        ], [
            'role_name.required' => 'Role name is required.',
            'role_name.unique'   => 'This role name already exists.',
        ]);

        return $v->fails() ? $v->errors()->first() : null;
    }
}
