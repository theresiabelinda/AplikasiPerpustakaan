@extends('layouts.app')

@section('title', 'Peminjaman Saya')

@section('content')

    <div class="card">
        <h2>Riwayat Peminjaman</h2>

        <table>
            <tr>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>

            @foreach($peminjaman as $p)
                <tr>
                    <td>{{ $p->buku->judul }}</td>
                    <td>{{ $p->tgl_pinjam }}</td>
                    <td>{{ $p->tgl_kembali ?? '-' }}</td>
                    <td>{{ $p->status }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
