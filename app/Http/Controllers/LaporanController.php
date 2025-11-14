<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Peminjaman::latest()->get();

        return view('admin.laporan.index', compact('laporan'));
    }
}
