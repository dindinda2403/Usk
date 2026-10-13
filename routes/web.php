<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

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

    // 1. Route yang BISA DIBACHA/DILIHAT OLEH SEMUA USER (Admin & Peserta)
    Route::get('/skemas', [SkemaController::class, 'index'])->name('skemas.index');
    Route::get('/skemas/{skema}', [SkemaController::class, 'show'])->name('skemas.show');
    
    Route::get('/pesertas', [PesertaController::class, 'index'])->name('pesertas.index');
    Route::get('/pesertas/{peserta}', [PesertaController::class, 'show'])->name('pesertas.show');

    // 2. Route KHUSUS ADMIN (Create, Edit, Update, Delete)
    // Supaya peserta tidak bisa akses lewat ketik URL manual
    Route::middleware('can:admin')->group(function () {
        // CRUD Skema (Aksi Tambah, Edit, Hapus)
        Route::get('/skemas/create', [SkemaController::class, 'create'])->name('skemas.create');
        Route::post('/skemas', [SkemaController::class, 'store'])->name('skemas.store');
        Route::get('/skemas/{skema}/edit', [SkemaController::class, 'edit'])->name('skemas.edit');
        Route::put('/skemas/{skema}', [SkemaController::class, 'update'])->name('skemas.update');
        Route::delete('/skemas/{skema}', [SkemaController::class, 'destroy'])->name('skemas.destroy');

        // CRUD Peserta (Aksi Tambah, Edit, Hapus)
        Route::get('/pesertas/create', [PesertaController::class, 'create'])->name('pesertas.create');
        Route::post('/pesertas', [PesertaController::class, 'store'])->name('pesertas.store');
        Route::get('/pesertas/{peserta}/edit', [PesertaController::class, 'edit'])->name('pesertas.edit');
        Route::put('/pesertas/{peserta}', [PesertaController::class, 'update'])->name('pesertas.update');
        Route::delete('/pesertas/{peserta}', [PesertaController::class, 'destroy'])->name('pesertas.destroy');
    });
});

// Redirect halaman utama ke login
Route::get('/', function () {
    return view('welcome');
});
