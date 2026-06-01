<?php

namespace App\Libraries\Admin\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $user = Auth::guard('admin')->user()->load(['profile', 'userRoles.role']);
        $data['user'] = $user;
        return view('admin.profile.index')->with($data);
    }
}
