<?php

use App\Http\Controllers\GatewayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/{any}',[GatewayController::class,'index']);

//Route::get('/users', function () {
//    $data = [
//        [
//            'id' => 'openInvoices',
//            'title' => 'Open invoices',
//            'value' => '$35,548',
//            'changeText' => '$1, 450',
//            'changeDirection' => 'down',
//        ],
//        [
//            'id' => 'ongoingProjects',
//            'title' => 'Ongoing project',
//            'value' => '15',
//            'changeText' => '25.36%',
//            'changeDirection' => 'up',
//        ],
//        [
//            'id' => 'employees',
//            'title' => 'Employees',
//            'value' => '25',
//            'changeText' => '2.5%',
//            'changeDirection' => 'up',
//        ],
//        [
//            'id' => 'newProfit',
//            'title' => 'New profit',
//            'value' => '27%',
//            'changeText' => '4%',
//            'changeDirection' => 'up',
//        ],
//    ];
//
//    return $data;
//});
