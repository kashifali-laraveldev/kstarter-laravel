<?php
namespace App\Libraries\Admin\Acl\Permissions;
use Illuminate\Http\Request;
class AdminPermissionsFormAddLibrary {
    public function __construct() {}
    public function formAdd(Request $request) {
        return response()->json(['html' => view('admin.permissions.partials.form_add')->render()]);
    }
}
