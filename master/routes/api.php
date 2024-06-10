<?php

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::get('/v1/users', function (Request $request) {
    return response()->json([
        [
            'name' => 'John Doe',
            'email'=>'lV2pI@example.com'
        ],
        [
            'name' => 'Kafi',
            'email'=>'lV2pI@example.com'
        ]
    ]);
});
