<?php

namespace App\Libraries\Admin\Acl\Permissions;

use App\Models\PermissionsModel;
use Illuminate\Http\Request;

class AdminPermissionsIndexLibrary
{
    protected PermissionsModel $permissionsModel;

    public function __construct()
    {
        $this->permissionsModel = new PermissionsModel();
    }

    public function index(Request $request)
    {
        $data['permissions'] = $this->permissionsModel->newQuery()->with('category')->orderBy('id', 'desc')->get();
        return view('admin.permissions.index')->with($data);
    }
}
