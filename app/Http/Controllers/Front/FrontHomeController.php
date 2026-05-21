<?php

namespace App\Http\Controllers\Front;

use App\Services\Front\FrontHomeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    protected FrontHomeService $frontHomeService;
    public function __construct()
    {
        $this->frontHomeService = new FrontHomeService();
    }

    public function index(Request $request)
    {
        return $this->frontHomeService->index($request);
    }
}
