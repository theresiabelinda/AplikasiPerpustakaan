@extends('layouts.app')

@section('title', 'Pencarian Buku')

@section('content')

    <div class="card">
        <h2>Pencarian Buku</h2>

        <form method="GET">
            <input type="text" name="keyword" placeholder="Cari judul atau pengarang...">
            <button type="submit">Cari</button>
        </form>

        <table>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Status</th>
            </tr>

            @foreach($buku as $b)
                <tr>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->pengarang }}</td>
                    <td>{{ $b->status }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
