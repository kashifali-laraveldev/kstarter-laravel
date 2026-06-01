<?php

namespace App\Libraries\Admin\Auth\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginLogoutLibrary
{
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
