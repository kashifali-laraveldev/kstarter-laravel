<?php

namespace App\Http\Controllers\Admin\Acl\Users;

use App\Services\Admin\Acl\Users\AdminUsersService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    protected AdminUsersService $adminUsersService;

    public function __construct()
    {
        $this->adminUsersService = new AdminUsersService();
    }

    public function index(Request $request)
    {
        return $this->adminUsersService->index($request);
    }

    public function formAdd(Request $request)
    {
        return $this->adminUsersService->formAdd($request);
    }

    public function formEdit(Request $request, string $id)
    {
        return $this->adminUsersService->formEdit($request, $id);
    }

    public function store(Request $request)
    {
        return $this->adminUsersService->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->adminUsersService->update($request, $id);
    }

    public function delete(Request $request, string $id)
    {
        return $this->adminUsersService->delete($request, $id);
    }

    public function toggleStatus(Request $request, string $id)
    {
        return $this->adminUsersService->toggleStatus($request, $id);
    }
}
