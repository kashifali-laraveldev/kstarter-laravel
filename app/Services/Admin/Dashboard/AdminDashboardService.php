<?php

namespace App\Services\Admin\Dashboard;

use App\Libraries\Admin\Dashboard\AdminDashboardLibrary;
use Illuminate\Http\Request;

class AdminDashboardService
{
    protected AdminDashboardLibrary $adminDashboardLibrary;
    public function __construct()
    {
        $this->adminDashboardLibrary = new AdminDashboardLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminDashboardLibrary->index($request);
    }
}
