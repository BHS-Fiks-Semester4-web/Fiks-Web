<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\barangController;


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

Route::get('/login-mobile', [AuthController::class, 'loginMobile']);
Route::post('/register-mobile',[AuthController::class,'registerMobile']);
Route::put('/users/{id}', [AuthController::class, 'update']);

Route::middleware('auth:api')->get('/get-user', [AuthController::class, 'getUserByToken']);
