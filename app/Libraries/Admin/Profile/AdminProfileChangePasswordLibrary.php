<?php

namespace App\Libraries\Admin\Profile;

use App\Validations\Profile\AdminProfileChangePasswordValidation;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileChangePasswordLibrary
{
    protected AdminProfileChangePasswordValidation $validation;
    protected UsersModel $usersModel;

    public function __construct()
    {
        $this->validation = new AdminProfileChangePasswordValidation();
        $this->usersModel = new UsersModel();
    }

    public function changePassword(Request $request)
    {
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs);

        if ($error) {
            return response()->json(['status' => false, 'message' => $error]);
        }

        $user = Auth::guard('admin')->user();

        if (!Hash::check($inputs['current_password'], $user->password)) {
            return response()->json(['status' => false, 'message' => 'Current password is incorrect.']);
        }

        $this->usersModel->newQuery()->where('id', $user->id)->update([
            'password' => Hash::make($inputs['new_password']),
        ]);

        return response()->json(['status' => true, 'message' => 'Password changed successfully.']);
    }
}
