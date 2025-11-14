<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;
use App\Models\Peminjaman;

class AnggotaController extends Controller
{
    public function pencarian(Request $request)
    {
        $keyword = $request->keyword;

        $buku = Buku::when($keyword, function ($query) use ($keyword) {
            $query->where('judul', 'like', '%'.$keyword.'%')
                ->orWhere('pengarang', 'like', '%'.$keyword.'%');
        })->get();

        return view('anggota.pencarian', compact('buku'));
    }

    public function peminjaman()
    {
        $peminjaman = Peminjaman::where('anggota_id', Auth::id())->get();

        return view('anggota.peminjaman', compact('peminjaman'));
    }

    public function profil()
    {
        $anggota = Auth::user();
        return view('anggota.profil', compact('anggota'));
    }

    public function updateProfil(Request $request)
    {
        $anggota = Auth::user();

        $anggota->nama = $request->nama;
        $anggota->email = $request->email;

        if($request->password){
            $anggota->password = bcrypt($request->password);
        }

        $anggota->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function bantuan()
    {
        return view('anggota.bantuan');
    }
}
