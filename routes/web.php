<?php

use Illuminate\Support\Facades\Route;

// ADMIN CONTROLLERS
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaAdminController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AnggotaController;

Route::get('/', function () {
    return view('welcome');
});

//ADMIN
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    // Buku (Koleksi)
    Route::resource('/buku', BukuController::class)->names('admin.buku');

    // Anggota
    Route::resource('/anggota', AnggotaAdminController::class)->names('admin.anggota');

    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('admin.transaksi.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('admin.transaksi.store');
    Route::post('/transaksi/{id}/pengembalian', [TransaksiController::class, 'pengembalian'])->name('admin.transaksi.pengembalian');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
});

//ANGGOTA
Route::prefix('anggota')->middleware(['auth'])->group(function () {

    // Pencarian Buku
    Route::get('/pencarian', [AnggotaController::class, 'pencarian'])->name('anggota.pencarian');

    // Riwayat Peminjaman
    Route::get('/peminjaman', [AnggotaController::class, 'peminjaman'])->name('anggota.peminjaman');

    // Profil Anggota
    Route::get('/profil', [AnggotaController::class, 'profil'])->name('anggota.profil');
    Route::post('/profil/update', [AnggotaController::class, 'updateProfil'])->name('anggota.profil.update');

    // Bantuan
    Route::get('/bantuan', [AnggotaController::class, 'bantuan'])->name('anggota.bantuan');
});
