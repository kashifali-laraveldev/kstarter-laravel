<?php

namespace App\Libraries\Admin\Auth\Login;

use App\Validations\Auth\AdminLoginValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminLoginPostLibrary
{
    protected AdminLoginValidation $adminLoginValidation;

    public function __construct()
    {
        $this->adminLoginValidation = new AdminLoginValidation();
    }

    public function login(Request $request)
    {
        $inputs = $request->all();
        $errorMessage = $this->adminLoginValidation->validate($inputs);

        if ($errorMessage) {
            return back()
                ->withErrors(['username' => 'Invalid credentials.'])
                ->withInput($request->only('username'));
        }

        $credentials = [
            'user_name' => $inputs['username'],
            'password'  => $inputs['password'],
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            if (!Auth::guard('admin')->user()->is_active) {
                Auth::guard('admin')->logout();
                return back()
                    ->withErrors(['username' => 'Your account has been deactivated.'])
                    ->withInput($request->only('username'));
            }

            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()
            ->withErrors(['username' => 'Invalid credentials.'])
            ->withInput($request->only('username'));
    }
}
