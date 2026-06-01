<?php

namespace App\Libraries\Admin\Acl\Users;

use App\Validations\Users\AdminUsersStoreValidation;
use App\Models\UsersModel;
use App\Models\UserProfilesModel;
use App\Models\UserRolesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersStoreLibrary
{
    protected AdminUsersStoreValidation $validation;
    protected UsersModel $usersModel;
    protected UserProfilesModel $userProfilesModel;
    protected UserRolesModel $userRolesModel;

    public function __construct()
    {
        $this->validation        = new AdminUsersStoreValidation();
        $this->usersModel        = new UsersModel();
        $this->userProfilesModel = new UserProfilesModel();
        $this->userRolesModel    = new UserRolesModel();
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs);

        if ($error) {
            return response()->json(['status' => false, 'message' => $error]);
        }

        $user = $this->usersModel->newQuery()->create([
            'user_name' => $inputs['username'],
            'password'  => Hash::make($inputs['password']),
            'is_active' => 1,
        ]);

        $this->userProfilesModel->newQuery()->create([
            'user_name'       => $user->user_name,
            'first_name'      => $inputs['first_name'],
            'last_name'       => $inputs['last_name'],
            'email_address'   => $inputs['email_address']   ?? null,
            'mobile_number'   => $inputs['mobile_number']   ?? null,
            'department_name' => $inputs['department_name'] ?? null,
        ]);

        foreach ((array) ($inputs['role_id'] ?? []) as $encodedRoleId) {
            $this->userRolesModel->newQuery()->create([
                'user_id' => $user->id,
                'role_id' => decodeId($encodedRoleId),
            ]);
        }

        return response()->json(['status' => true, 'message' => 'User created successfully.']);
    }
}
