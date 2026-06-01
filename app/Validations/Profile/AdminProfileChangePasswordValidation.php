<?php

namespace App\Validations\Profile;

use Illuminate\Support\Facades\Validator;

class AdminProfileChangePasswordValidation
{
    public function validate(array $data): ?string
    {
        $v = Validator::make($data, [
            'current_password'          => 'required|string',
            'new_password'              => 'required|string|min:6|confirmed',
            'new_password_confirmation' => 'required|string',
        ], [
            'current_password.required' => 'Current password is required.',
            'new_password.required'     => 'New password is required.',
            'new_password.min'          => 'New password must be at least 6 characters.',
            'new_password.confirmed'    => 'Passwords do not match.',
        ]);

        return $v->fails() ? $v->errors()->first() : null;
    }
}
