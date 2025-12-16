<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\PeristiwaKematianController;
use App\Http\Controllers\PeristiwaPindahController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);
Route::resource('peristiwa_kematian', PeristiwaKematianController::class);
Route::resource('peristiwa_pindah', PeristiwaPindahController::class);


// === MEDIA ===
Route::resource('media', MediaController::class);


// === LOGIN ===
Route::get('auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


// === MAHASISWA ===
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);


// === ABOUT ===
Route::get('/about', function () {
    return view('halaman-about');
});


// === Login ===
Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware('checkislogin')
    ->name('dashboard');


// === USER (khusus Admin) ===
Route::group(['middleware' => ['checkrole:Admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('warga', WargaController::class);
    Route::resource('keluarga_kk', KeluargaKKController::class);
    Route::resource('anggota_keluarga', AnggotaKeluargaController::class);
    Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);
    Route::resource('peristiwa_kematian', PeristiwaKematianController::class);
    Route::resource('peristiwa_pindah', PeristiwaPindahController::class);
    Route::resource('media', MediaController::class);
    Route::resource('user', UserController::class);
});

// Route::resource('user', UserController::class);

