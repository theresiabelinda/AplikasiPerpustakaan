<?php

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

Route::get('/', function () {
    return view('welcome');
});

//admin.koleksi
    Route::get('/admin/koleksi', function () {
        return view('admin.koleksi');

    });

    //admin.dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Route::get('/admin/keuangan', function () {
    return view('admin.keuangan');
});

// Route Dummy (Sementara) untuk menu yang belum dibuat
Route::get('/admin/anggota', function () {
    return view('admin.dashboard')->with('message', 'Halaman Manajemen Anggota (Dummy)');
});

Route::get('/admin/transaksi', function () {
    return view('admin.dashboard')->with('message', 'Halaman Transaksi (Dummy)');
});

Route::get('/admin/laporan', function () {
    return view('admin.dashboard')->with('message', 'Halaman Laporan (Dummy)');
});
