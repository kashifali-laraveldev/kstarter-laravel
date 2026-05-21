<?php

namespace App\Libraries\Admin\Profile;

use Illuminate\Http\Request;

class AdminProfileLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $data = [];
        return view('admin.profile.index')->with($data);
    }
}
