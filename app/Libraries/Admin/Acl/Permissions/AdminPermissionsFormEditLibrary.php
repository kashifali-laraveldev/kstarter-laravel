<?php
namespace App\Libraries\Admin\Acl\Permissions;
use Illuminate\Http\Request;
class AdminPermissionsFormEditLibrary {
    public function __construct() {}
    public function formEdit(Request $request, $id) {
        $data = ['id' => $id];
        return response()->json(['html' => view('admin.permissions.partials.form_edit', $data)->render()]);
    }
}
