<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ketua', function () {
    return view('ketua');
});
Route::get('/anggota', function () {
    return view('anggota');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource routes
Route::resource('anggota-keluarga', AnggotaKeluargaController::class);
Route::resource('warga', WargaController::class);
