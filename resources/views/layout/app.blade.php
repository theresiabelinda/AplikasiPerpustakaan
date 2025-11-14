<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }
        .navbar {
            background: #0d6efd;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }
        .sidebar {
            width: 230px;
            background: #2c3e50;
            height: 100vh;
            position: fixed;
            top: 55px;
            left: 0;
            padding-top: 20px;
        }
        .sidebar a {
            color: #bdc3c7;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #34495e;
            color: white;
        }
        .content {
            margin-left: 230px;
            padding: 25px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 7px;
        }
    </style>

</head>
<body>

{{-- NAVBAR --}}
<div class="navbar">
    <div>
        <a href="#">📚 Sistem Perpustakaan</a>
    </div>

    <div>
        <span>👤 {{ auth()->user()->nama ?? 'User' }}</span>
    </div>
</div>

{{-- SIDEBAR --}}
<div class="sidebar">

    {{-- MENU ADMIN --}}
    @if(auth()->user()->role == 'admin')
        <a href="{{ url('/admin/dashboard') }}">Dashboard Admin</a>
        <a href="{{ url('/admin/koleksi') }}">Manajemen Koleksi</a>
        <a href="{{ url('/admin/anggota') }}">Manajemen Anggota</a>
        <a href="{{ url('/admin/transaksi') }}">Transaksi</a>
        <a href="{{ url('/admin/laporan') }}">Laporan</a>
    @endif

    {{-- MENU ANGGOTA --}}
    @if(auth()->user()->role == 'anggota')
        <a href="{{ route('anggota.pencarian') }}">Pencarian Buku</a>
        <a href="{{ route('anggota.peminjaman') }}">Peminjaman Saya</a>
        <a href="{{ route('anggota.profil') }}">Profil Saya</a>
        <a href="{{ route('anggota.bantuan') }}">Bantuan</a>
    @endif

</div>

{{-- KONTEN --}}
<div class="content">
    @yield('content')
</div>

</body>
</html>
