<?php

namespace App\Libraries\Admin\Acl\Users;

use App\Models\UsersModel;
use Illuminate\Http\Request;

class AdminUsersToggleStatusLibrary
{
    protected UsersModel $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function toggleStatus(Request $request, string $encodedId)
    {
        $id = decodeId($encodedId);

        if ($id === 1) {
            return response()->json(['status' => false, 'message' => 'The primary system account status cannot be changed.']);
        }

        $user      = $this->usersModel->newQuery()->findOrFail($id);
        $newActive = $user->is_active ? 0 : 1;
        $user->update(['is_active' => $newActive]);

        return response()->json([
            'status'     => true,
            'message'    => 'User status updated successfully.',
            'new_status' => $newActive ? 'Active' : 'Inactive',
        ]);
    }
}
