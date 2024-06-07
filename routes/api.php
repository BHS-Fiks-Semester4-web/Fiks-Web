<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Mobile\DataBarang;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Mobile\KategoriController;
use App\Http\Controllers\Mobile\LupaPw;






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
Route::post('/upload-image', 'ImageController@uploadImage');
Route::middleware('auth:api')->get('/get-user', [AuthController::class, 'getUserByToken']);
Route::post('/lupa', [AuthController::class, 'lupa']);
Route::post('/reset', [AuthController::class, 'resetPassword']);


// Route::post('/barang', [BarangController::class, 'create']);
// Route::put('/barang/{id}', [BarangController::class, 'update']);
// Route::delete('/barang/{id}', [BarangController::class, 'delete']);
// Route::get('/barang', [BarangController::class, 'index']);

Route::resource('data_barang', DataBarang::class);
Route::get('barang/{id_jenis_barang}', [DataBarang::class, 'getBarangByIdJenis']);



// Mengambil semua data penghasilan harian
// Route::get('/daily-incomes', [PenjualanController::class, 'index']);


Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);



Route::post('/forgot-password', [LupaPw::class, 'sendResetLinkEmail']);











