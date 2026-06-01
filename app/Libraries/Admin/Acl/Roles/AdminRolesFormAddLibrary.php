<?php
namespace App\Libraries\Admin\Acl\Roles;
use Illuminate\Http\Request;
class AdminRolesFormAddLibrary {
    public function __construct() {}
    public function formAdd(Request $request) {
        return response()->json(['html' => view('admin.roles.partials.form_add')->render()]);
    }
}
