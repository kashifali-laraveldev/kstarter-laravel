<?php

namespace App\Validations\Profile;

use Illuminate\Support\Facades\Validator;

class AdminProfileUpdateValidation
{
    public function validate(array $data): ?string
    {
        $v = Validator::make($data, [
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required'  => 'Last name is required.',
        ]);

        return $v->fails() ? $v->errors()->first() : null;
    }
}
