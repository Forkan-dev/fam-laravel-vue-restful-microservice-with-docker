<?php

namespace App\Http\Controllers;

use App\Services\Gateway\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayController extends Controller
{
    public function __construct()
    {
        $this->gateWay = resolve(Gateway::class);
    }

    public function index(Request $request)
    {
        $response = $this->gateWay->handle($request);
        return $response;
    }
}
