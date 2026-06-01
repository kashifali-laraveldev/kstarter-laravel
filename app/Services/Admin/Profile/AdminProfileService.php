<?php

namespace App\Services\Admin\Profile;

use App\Libraries\Admin\Profile\AdminProfileLibrary;
use App\Libraries\Admin\Profile\AdminProfileUpdateLibrary;
use App\Libraries\Admin\Profile\AdminProfileChangePasswordLibrary;
use Illuminate\Http\Request;

class AdminProfileService
{
    protected AdminProfileLibrary $adminProfileLibrary;
    protected AdminProfileUpdateLibrary $adminProfileUpdateLibrary;
    protected AdminProfileChangePasswordLibrary $adminProfileChangePasswordLibrary;

    public function __construct()
    {
        $this->adminProfileLibrary               = new AdminProfileLibrary();
        $this->adminProfileUpdateLibrary         = new AdminProfileUpdateLibrary();
        $this->adminProfileChangePasswordLibrary = new AdminProfileChangePasswordLibrary();
    }

    public function index(Request $request)
    {
        return $this->adminProfileLibrary->index($request);
    }

    public function update(Request $request)
    {
        return $this->adminProfileUpdateLibrary->update($request);
    }

    public function changePassword(Request $request)
    {
        return $this->adminProfileChangePasswordLibrary->changePassword($request);
    }
}
