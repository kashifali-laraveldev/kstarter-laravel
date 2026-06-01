<?php

namespace App\Libraries\Admin\Acl\PermissionCategories;

use App\Models\PermissionCategoriesModel;
use Illuminate\Http\Request;

class AdminPermissionCategoriesOrderLibrary
{
    protected PermissionCategoriesModel $permissionCategoriesModel;

    public function __construct()
    {
        $this->permissionCategoriesModel = new PermissionCategoriesModel();
    }

    public function updateOrder(Request $request, string $encodedId)
    {
        $id    = decodeId($encodedId);
        $order = max(1, (int) $request->input('order', 1));

        $this->permissionCategoriesModel->newQuery()->findOrFail($id)->update(['display_order' => $order]);

        return response()->json(['status' => true, 'message' => 'Order updated.']);
    }
}
