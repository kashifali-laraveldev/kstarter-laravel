<?php

namespace App\Validations\Users;

use Illuminate\Support\Facades\Validator;

class AdminUsersUpdateValidation
{
    public function validate(array $data, int $excludeId): ?string
    {
        $v = Validator::make($data, [
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'username'   => 'required|string|max:100|unique:ks_users,user_name,' . $excludeId,
            'password'   => 'nullable|string|min:6|confirmed',
            'role_id'    => 'required|array|min:1',
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required'  => 'Last name is required.',
            'username.required'   => 'Username is required.',
            'username.unique'     => 'This username is already taken.',
            'password.min'        => 'Password must be at least 6 characters.',
            'password.confirmed'  => 'Passwords do not match.',
            'role_id.required'    => 'Please select a role.',
        ]);

        return $v->fails() ? $v->errors()->first() : null;
    }
}
