<?php

namespace App\Validations\Auth;

use Illuminate\Support\Facades\Validator;

class AdminLoginValidation
{
    public function validate(array $data)
    {
        $validation = Validator::make($data, [
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username is required.',
            'password.required' => 'Password is required.',
        ]);

        if ($validation->fails()) {
            return $validation->errors()->first();
        }
    }
}
