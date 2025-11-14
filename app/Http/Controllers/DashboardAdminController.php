<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalBuku' => Buku::count(),
            'totalAnggota' => User::where('role', 'anggota')->count(),
            'totalPinjam' => Peminjaman::count(),
        ]);
    }
}
