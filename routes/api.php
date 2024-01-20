<?php

use App\Http\Controllers\admin\AuthController;
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

Route::prefix('iot')->group(function () {
    Route::get('/get', [AuthController::class, 'register']);
});
//auth Routing
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// auth user tipe admin
Route::middleware(['auth:sanctum', 'user-access:admin'])->group(function () {
    Route::prefix('test')->group(function () {
        Route::get('/user', [AuthController::class, 'test']);
    });
});
