<?php

namespace App\Libraries\Front;

use Illuminate\Http\Request;

class FrontHomeViewLibrary
{
    public function __construct() {}

    public function index(Request $request)
    {
        $data = [];
        return view('front.home.index')->with($data);
    }
}
