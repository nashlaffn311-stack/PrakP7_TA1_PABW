<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\AuthController;

// Halaman utama langsung ke Form Lapor Warga
Route::get('/', [LaporBanjirController::class, 'create'])->name('lapor.create');
Route::post('/lapor', [LaporBanjirController::class, 'store'])->name('lapor.store');

// Guest Route (Login Petugas)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Route (Pengelolaan oleh Petugas)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('laporan', LaporBanjirController::class)->except(['create', 'store']);
});