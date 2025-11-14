<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AnggotaAdminController extends Controller
{
    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => 'anggota',
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil dibuat!');
    }

    public function edit($id)
    {
        $anggota = User::findOrFail($id);
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $anggota = User::findOrFail($id);

        $anggota->nama = $request->nama;
        $anggota->email = $request->email;

        if ($request->password) {
            $anggota->password = bcrypt($request->password);
        }

        $anggota->save();

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'Anggota berhasil dihapus!');
    }
}
