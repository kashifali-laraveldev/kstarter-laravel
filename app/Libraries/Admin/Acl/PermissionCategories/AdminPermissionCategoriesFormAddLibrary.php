<?php
namespace App\Libraries\Admin\Acl\PermissionCategories;
use Illuminate\Http\Request;
class AdminPermissionCategoriesFormAddLibrary {
    public function __construct() {}
    public function formAdd(Request $request) {
        return response()->json(['html' => view('admin.permission-categories.partials.form_add')->render()]);
    }
}
