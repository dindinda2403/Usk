<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Guest Routes (Hanya untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/Register', [AuthController::class, 'showRegister'])->name('Register');
    Route::post('/Register', [AuthController::class, 'Register'])->name('Register.post');
});

// Authenticated Routes (Harus login dulu)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Menggunakan Resource Route agar urutan URL otomatis BENAR dan TIDAK 404!
    Route::resource('skemas', SkemaController::class);
    Route::resource('pesertas', PesertaController::class);
     Route::resource('users', UserController::class);
});

// Redirect halaman utama
Route::get('/', function () {
    return view('welcome');
});
