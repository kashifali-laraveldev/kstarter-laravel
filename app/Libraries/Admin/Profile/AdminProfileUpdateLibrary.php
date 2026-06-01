<?php

namespace App\Libraries\Admin\Profile;

use App\Validations\Profile\AdminProfileUpdateValidation;
use App\Models\UserProfilesModel;
use App\Components\UploadAttachmentComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileUpdateLibrary
{
    protected AdminProfileUpdateValidation $validation;
    protected UserProfilesModel $userProfilesModel;

    public function __construct()
    {
        $this->validation        = new AdminProfileUpdateValidation();
        $this->userProfilesModel = new UserProfilesModel();
    }

    public function update(Request $request)
    {
        $inputs = $request->all();
        $error  = $this->validation->validate($inputs);

        if ($error) {
            return response()->json(['status' => false, 'message' => $error]);
        }

        $user    = Auth::guard('admin')->user();
        $profile = $this->userProfilesModel->newQuery()->firstOrNew(['user_name' => $user->user_name]);

        if ($request->hasFile('profile_picture')) {
            if ($profile->profile_picture) {
                deleteAttachmentFile($profile->profile_picture);
            }
            $profile->profile_picture = UploadAttachmentComponent::uploadAttachment(
                $request, 'profile_picture', 'profile_pictures', ['jpg', 'jpeg', 'png', 'gif', 'webp']
            );
        }

        $profile->first_name      = $inputs['first_name'];
        $profile->last_name       = $inputs['last_name'];
        $profile->mobile_number   = $inputs['mobile_number']  ?? $profile->mobile_number;
        $profile->department_name = $inputs['department_name'] ?? $profile->department_name;
        $profile->save();

        return response()->json(['status' => true, 'message' => 'Profile updated successfully.']);
    }
}
