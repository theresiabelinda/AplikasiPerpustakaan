<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Peminjaman::all();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        return view('admin.transaksi.create', [
            'buku' => Buku::all(),
        ]);
    }

    public function store(Request $request)
    {
        Peminjaman::create($request->all());
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil dibuat!');
    }

    public function pengembalian($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->status = 'Dikembalikan';
        $pinjam->tanggal_kembali = now();

        $pinjam->save();

        return back()->with('success', 'Buku berhasil dikembalikan!');
    }
}
