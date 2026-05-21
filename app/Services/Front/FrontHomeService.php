<?php

namespace App\Services\Front;

use App\Libraries\Front\FrontHomeViewLibrary;
use Illuminate\Http\Request;

class FrontHomeService
{
    protected FrontHomeViewLibrary $frontHomeViewLibrary;
    public function __construct()
    {
        $this->frontHomeViewLibrary = new FrontHomeViewLibrary();
    }

    public function index(Request $request)
    {
        return $this->frontHomeViewLibrary->index($request);
    }
}
