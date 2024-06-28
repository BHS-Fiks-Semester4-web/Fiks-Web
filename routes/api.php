<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Mobile\DetailTransaksi;
use App\Http\Controllers\Mobile\DataBarang;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Mobile\KategoriController;
use App\Http\Controllers\Mobile\LupaPw;
use App\Models\Transaksi;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Mobile\LayananServiceController;

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
Route::get('/users/{id}', [AuthController::class, 'getUserById']);
Route::post('/users/{id}/upload-profile-image', [AuthController:: class, 'uploadProfileImage']);
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

//route transaksi mobile
Route::resource('transaksi', TransaksiController::class)->only([
    'index', 'store', 'show'
]);
Route::get('penghasilan-bersih/{month}', [TransaksiController::class, 'getPenghasilanBersihPerBulan']);
Route::get('penghasilan/harian/{year}/{month}/{day}', 'App\Http\Controllers\Api\TransaksiController@getPenghasilanHarian');
Route::get('/penghasilan/{type}/{year}/{month}/{day?}', 'App\Http\Controllers\Api\TransaksiController@getPenghasilan');

Route::get('/penghasilan-dan-pengeluaran/{month}', [TransaksiController::class, 'getPenghasilanDanPengeluaran']);


Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);



Route::post('/forgot-password', [LupaPw::class, 'sendResetLinkEmail']);

Route::controller(LayananServiceController::class)->group(function () {
    Route::get('/layanan_service/pending', 'pending');
    Route::get('/layanan_service/in_progress', 'in_progress');
    Route::get('/layanan_service/done_unpaid', 'done_unpaid');
    Route::get('/layanan_service/done_paid', 'done_paid');
    Route::get('/layanan_service/pending_all', 'pending_all');
    Route::get('/layanan_service/in_progress_all', 'in_progress_all');
    Route::get('/layanan_service/done_unpaid_all', 'done_unpaid_all');
    Route::get('/layanan_service/done_paid_all', 'done_paid_all');
});
Route::resource('layanan_service', LayananServiceController::class);










