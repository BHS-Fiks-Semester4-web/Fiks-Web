<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingInfoController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\DataKategoriController;
use App\Http\Controllers\DataPemasokController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\risetpw;

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
    Route::get('/admin', 'signin')->name('admin');
    Route::post('/signin', 'authenticate');
    Route::get('/forgot_password', 'ForgotPw');
    Route::post('/signout', 'signout')->middleware('auth');
    Route::get('/dashboard', 'dashboard')->middleware('auth');
});

Route::get('/databarang', [DataBarangController::class, 'index'])->middleware('auth');
Route::get('/datakaryawan', [DataKaryawanController::class, 'index'])->middleware('auth');
Route::get('/datakategori', [DataKategoriController::class, 'index'])->middleware('auth');
Route::get('/datapemasok', [DataPemasokController::class, 'index'])->middleware('auth');


Route::get('/forgot-password', [LandingController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [LandingController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/verify-otp', [LandingController::class, 'showVerifyOTPForm'])->name('password.verify');
Route::post('/verify-otp', [LandingController::class, 'verifyOTP'])->name('password.verify');
Route::get('/reset-password/{token}', [risetpw::class,'showResetForm'])->name('password.reset');
Route::post('/reset-password', [risetpw::class, 'reset'])->name('password.update');
Route::get('/profile', [ProfilController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfilController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [ProfilController::class, 'update'])->name('profile.update');


