<?php

namespace App\Http\Controllers\Admin\Acl\Permissions;

use App\Services\Admin\Acl\Permissions\AdminPermissionsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPermissionsController extends Controller
{
    protected AdminPermissionsService $adminPermissionsService;

    public function __construct()
    {
        $this->adminPermissionsService = new AdminPermissionsService();
    }

    public function index(Request $request)
    {
        return $this->adminPermissionsService->index($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminPermissionsService->formAdd($request);
    }

    public function formEdit(Request $request, string $id)
    {
        return $this->adminPermissionsService->formEdit($request, $id);
    }

    public function store(Request $request)
    {
        return $this->adminPermissionsService->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->adminPermissionsService->update($request, $id);
    }

    public function delete(Request $request, string $id)
    {
        return $this->adminPermissionsService->delete($request, $id);
    }
}
