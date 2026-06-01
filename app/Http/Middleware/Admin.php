<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use App\Components\HasPermissionsComponent;
use Illuminate\Http\Request;
use Closure;

class Admin
{
    protected HasPermissionsComponent $permissions;

    public function __construct()
    {
        $this->permissions = new HasPermissionsComponent();
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->permissions->getModulesPremissions()) {

            if ($request->ajax()) {
                return response()->json(['status' => false, 'message' => 'Access Denied.']);
            }

            $fallback = $this->permissions->getModulesPremissionsBySlug('admin/dashboard')
                ? 'admin/dashboard'
                : ($this->permissions->getModulesPremissionsBySlug('admin/users') ? 'admin/users' : '/');

            return redirect($fallback)->with('flash_error_message', 'Access Denied.');
        }

        return $next($request);
    }
}
