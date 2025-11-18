<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\PeristiwaKematianController;
use App\Http\Controllers\PeristiwaPindahController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;


// Dashboard
Route::get('/', function () {
    return view('welcome');
});
Route::get('/ketua', fn() => view('ketua'));
Route::get('/anggota', fn() => view('anggota'));

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


// === DATA MASTER ===
Route::resource('warga', WargaController::class);
Route::resource('keluarga_kk', KeluargaKKController::class);
Route::resource('anggota_keluarga', AnggotaKeluargaController::class);


// === PERISTIWA KEPENDUDUKAN ===
// Ubah agar nama route sesuai sidebar
Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);
Route::resource('peristiwa_kematian', PeristiwaKematianController::class);
Route::resource('peristiwa_pindah', PeristiwaPindahController::class);

// === MEDIA ===
Route::resource('media', MediaController::class);

