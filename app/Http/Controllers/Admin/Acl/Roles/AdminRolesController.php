<?php

namespace App\Http\Controllers\Admin\Acl\Roles;

use App\Services\Admin\Acl\Roles\AdminRolesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRolesController extends Controller
{
    protected AdminRolesService $adminRolesService;

    public function __construct()
    {
        $this->adminRolesService = new AdminRolesService();
    }

    public function index(Request $request)
    {
        return $this->adminRolesService->index($request);
    }

    public function edit(Request $request, string $id)
    {
        return $this->adminRolesService->edit($request, $id);
    }

    public function formAdd(Request $request)
    {
        return $this->adminRolesService->formAdd($request);
    }

    public function store(Request $request)
    {
        return $this->adminRolesService->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->adminRolesService->update($request, $id);
    }

    public function delete(Request $request, string $id)
    {
        return $this->adminRolesService->delete($request, $id);
    }
}
