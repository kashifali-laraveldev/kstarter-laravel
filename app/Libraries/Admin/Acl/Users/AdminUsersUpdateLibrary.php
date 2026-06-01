<?php

namespace App\Libraries\Admin\Acl\Users;

use App\Validations\Users\AdminUsersUpdateValidation;
use App\Models\UsersModel;
use App\Models\UserProfilesModel;
use App\Models\UserRolesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersUpdateLibrary
{
    protected AdminUsersUpdateValidation $validation;
    protected UsersModel $usersModel;
    protected UserProfilesModel $userProfilesModel;
    protected UserRolesModel $userRolesModel;

    public function __construct()
    {
        $this->validation        = new AdminUsersUpdateValidation();
        $this->usersModel        = new UsersModel();
        $this->userProfilesModel = new UserProfilesModel();
        $this->userRolesModel    = new UserRolesModel();
    }

    public function update(Request $request, string $encodedId)
    {
        $id     = decodeId($encodedId);
        if ($id === 1) {
            return response()->json(['status' => false, 'message' => 'The primary system account is protected and cannot be updated.']);
        }
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs, $id);

        if ($error) {
            return response()->json(['status' => false, 'message' => $error]);
        }

        $user = $this->usersModel->newQuery()->findOrFail($id);

        $userData = [
            'user_name' => ($id === 1) ? $user->user_name : $inputs['username'],
        ];

        if (!empty($inputs['password'])) {
            $userData['password'] = Hash::make($inputs['password']);
        }

        $user->update($userData);

        $this->userProfilesModel->newQuery()->updateOrCreate(
            ['user_name' => $user->user_name],
            [
                'first_name'      => $inputs['first_name'],
                'last_name'       => $inputs['last_name'],
                'email_address'   => $inputs['email_address']   ?? null,
                'mobile_number'   => $inputs['mobile_number']   ?? null,
                'department_name' => $inputs['department_name'] ?? null,
            ]
        );

        $this->userRolesModel->newQuery()->where('user_id', $id)->delete();
        foreach ((array) ($inputs['role_id'] ?? []) as $encodedRoleId) {
            $this->userRolesModel->newQuery()->create([
                'user_id' => $id,
                'role_id' => decodeId($encodedRoleId),
            ]);
        }

        return response()->json(['status' => true, 'message' => 'User updated successfully.']);
    }
}
