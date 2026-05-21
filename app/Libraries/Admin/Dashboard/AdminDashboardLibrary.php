<?php

namespace App\Libraries\Admin\Dashboard;

use Illuminate\Http\Request;

class AdminDashboardLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $data = [];
        return view('admin.dashboard.index')->with($data);
    }
}
