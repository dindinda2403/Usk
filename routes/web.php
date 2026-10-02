<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

// Guest Routes (Hanya untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Authenticated Routes (Harus login dulu)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Mendaftarkan Route CRUD Skema dan Peserta
    Route::resource('skemas', SkemaController::class);
    Route::resource('pesertas', PesertaController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Redirect halaman utama ke login
Route::get('/', function () {
    return redirect()->route('login');
});
