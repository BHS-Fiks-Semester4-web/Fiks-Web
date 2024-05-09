<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingInfoController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\DataKategoriController;
use App\Http\Controllers\DataPemasokController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [LandingInfoController::class, 'index'])->name('home');

Route::controller(LandingController::class)->group(function () {
    Route::get('/admin', 'signin');
    Route::post('/signin', 'authenticate');
    Route::post('/signout', 'signout')->middleware('auth');
    Route::get('/dashboard', 'dashboard')->middleware('auth');
});

Route::get('/databarang', [DataBarangController::class, 'index'])->middleware('auth');
Route::get('/datakaryawan', [DataKaryawanController::class, 'index'])->middleware('auth');
Route::get('/datakategori', [DataKategoriController::class, 'index'])->middleware('auth');
Route::get('/datapemasok', [DataPemasokController::class, 'index'])->middleware('auth');