<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Services\Admin\Profile\AdminProfileService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    protected AdminProfileService $adminProfileService;

    public function __construct()
    {
        $this->adminProfileService = new AdminProfileService();
    }

    public function index(Request $request)
    {
        return $this->adminProfileService->index($request);
    }

    public function update(Request $request)
    {
        return $this->adminProfileService->update($request);
    }

    public function changePassword(Request $request)
    {
        return $this->adminProfileService->changePassword($request);
    }
}
