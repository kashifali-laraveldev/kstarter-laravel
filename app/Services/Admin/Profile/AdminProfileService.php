<?php

namespace App\Services\Admin\Profile;

use App\Libraries\Admin\Profile\AdminProfileLibrary;
use Illuminate\Http\Request;

class AdminProfileService
{
    protected AdminProfileLibrary $adminProfileLibrary;
    public function __construct()
    {
        $this->adminProfileLibrary = new AdminProfileLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminProfileLibrary->index($request);
    }
}
