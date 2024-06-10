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

    public function index()
    {
        $url = $_SERVER['REQUEST_URI'];
        $response = $this->gateWay->handle($url);
        $response = Http::withoutVerifying()->get($response);
        return $response;
    }
}
