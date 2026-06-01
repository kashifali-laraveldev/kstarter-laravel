<?php
namespace App\Libraries\Admin\Acl\Users;
use Illuminate\Http\Request;
class AdminUsersFormAddLibrary {
    public function __construct() {}
    public function formAdd(Request $request) {
        return response()->json(['html' => view('admin.users.partials.form_add')->render()]);
    }
}
