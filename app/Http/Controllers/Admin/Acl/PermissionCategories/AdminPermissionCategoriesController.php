<?php

namespace App\Http\Controllers\Admin\Acl\PermissionCategories;

use App\Services\Admin\Acl\PermissionCategories\AdminPermissionCategoriesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPermissionCategoriesController extends Controller
{
    protected AdminPermissionCategoriesService $adminPermissionCategoriesService;

    public function __construct()
    {
        $this->adminPermissionCategoriesService = new AdminPermissionCategoriesService();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionCategoriesService->index($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminPermissionCategoriesService->formAdd($request);
    }

    public function formEdit(Request $request, string $id)
    {
        return $this->adminPermissionCategoriesService->formEdit($request, $id);
    }

    public function store(Request $request)
    {
        return $this->adminPermissionCategoriesService->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->adminPermissionCategoriesService->update($request, $id);
    }

    public function delete(Request $request, string $id)
    {
        return $this->adminPermissionCategoriesService->delete($request, $id);
    }

    public function updateOrder(Request $request, string $id)
    {
        return $this->adminPermissionCategoriesService->updateOrder($request, $id);
    }
}
