<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Services\Admin\Dashboard\AdminDashboardService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected AdminDashboardService $adminDashboardService;
    public function __construct()
    {
        $this->adminDashboardService = new AdminDashboardService();
    }

    public function index(Request $request)
    {
        return $this->adminDashboardService->index($request);
    }
}
