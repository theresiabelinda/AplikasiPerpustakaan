<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('admin.buku.index', compact('buku'));
    }

    public function create()
    {
        return view('admin.buku.create');
    }

    public function store(Request $request)
    {
        Buku::create($request->all());
        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy($id)
    {
        Buku::findOrFail($id)->delete();
        return back()->with('success', 'Buku berhasil dihapus!');
    }
}
