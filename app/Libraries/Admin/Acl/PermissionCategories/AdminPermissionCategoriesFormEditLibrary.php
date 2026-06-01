<?php
namespace App\Libraries\Admin\Acl\PermissionCategories;
use Illuminate\Http\Request;
class AdminPermissionCategoriesFormEditLibrary {
    public function __construct() {}
    public function formEdit(Request $request, $id) {
        $data = ['id' => $id];
        return response()->json(['html' => view('admin.permission-categories.partials.form_edit', $data)->render()]);
    }
}
