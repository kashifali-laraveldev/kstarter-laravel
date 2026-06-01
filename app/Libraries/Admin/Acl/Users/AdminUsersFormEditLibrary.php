<?php
namespace App\Libraries\Admin\Acl\Users;
use Illuminate\Http\Request;
class AdminUsersFormEditLibrary {
    public function __construct() {}
    public function formEdit(Request $request, $id) {
        $data = ['id' => $id];
        return response()->json(['html' => view('admin.users.partials.form_edit', $data)->render()]);
    }
}
