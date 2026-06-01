<?php

namespace App\Libraries\Admin\Acl\Users;

use App\Models\UsersModel;
use App\Models\UserProfilesModel;
use App\Models\UserRolesModel;
use Illuminate\Http\Request;

class AdminUsersDeleteLibrary
{
    protected UsersModel $usersModel;
    protected UserProfilesModel $userProfilesModel;
    protected UserRolesModel $userRolesModel;

    public function __construct()
    {
        $this->usersModel        = new UsersModel();
        $this->userProfilesModel = new UserProfilesModel();
        $this->userRolesModel    = new UserRolesModel();
    }

    public function delete(Request $request, string $encodedId)
    {
        $id = decodeId($encodedId);

        if ($id === 1) {
            return response()->json(['status' => false, 'message' => 'The primary system account is protected and cannot be deleted.']);
        }

        $user = $this->usersModel->newQuery()->findOrFail($id);

        $this->userRolesModel->newQuery()->where('user_id', $id)->delete();
        $this->userProfilesModel->newQuery()->where('user_name', $user->user_name)->delete();
        $user->delete();

        return response()->json(['status' => true, 'message' => 'User deleted successfully.']);
    }
}
