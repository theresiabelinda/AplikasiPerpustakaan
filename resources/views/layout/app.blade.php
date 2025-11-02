<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Gaya Kustom untuk Sidebar */
        .sidebar {
            width: 250px; /* Lebar sidebar */
            position: fixed; /* KUNCI: Membuat sidebar tetap */
            top: 56px; /* Di bawah navbar fixed-top */
            left: 0;
            bottom: 0;
            background-color: #343a40; /* Warna gelap */
            padding-top: 20px;
            color: #adb5bd;
            z-index: 1000;
            overflow-y: auto; /* Memungkinkan scroll jika menu banyak */
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 10px 15px;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff;
            background-color: #495057;
            border-left: 3px solid #0d6efd; /* Warna aktif */
        }

        /* Gaya Kunci untuk Konten Utama */
        .main-content {
            margin-left: 250px; /* Dorong konten sejauh lebar sidebar */
            padding-top: 76px; /* Padding untuk konten di bawah navbar */
            min-height: 100vh; /* Memastikan area konten minimal setinggi layar */
        }
        .navbar {
            z-index: 1010; /* Pastikan navbar di atas sidebar */
        }

        /* Gaya untuk Tombol Back-to-Dashboard (jika digunakan) */
        .back-to-dashboard-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1020;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 50px;
            padding: 12px 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-book-open me-2"></i> Perpustakaan Admin
        </a>
        <span class="navbar-text text-white-50 ms-auto">
                <i class="fas fa-user-circle"></i> Admin User
            </span>
    </div>
</nav>

<div class="sidebar">
    <ul class="nav flex-column">

        {{-- Logika Blade untuk menandai link aktif --}}
        @php
            // Mengambil path URL saat ini (misal: admin/koleksi)
            $currentPath = request()->path(); // Menggunakan helper function request()
            // Jika route Laravel 10 Anda menggunakan Request::is() itu lebih baik,
            // tapi ini aman untuk simulasi.
        @endphp

        <li class="nav-item">
            <a class="nav-link {{ str_contains($currentPath, 'dashboard') || $currentPath == 'admin' ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ str_contains($currentPath, 'koleksi') ? 'active' : '' }}" href="{{ url('/admin/koleksi') }}">
                <i class="fas fa-fw fa-book-reader me-2"></i> Manajemen Koleksi
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ str_contains($currentPath, 'anggota') ? 'active' : '' }}" href="{{ url('/admin/anggota') }}">
                <i class="fas fa-fw fa-users me-2"></i> Manajemen Anggota
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ str_contains($currentPath, 'transaksi') ? 'active' : '' }}" href="{{ url('/admin/transaksi') }}">
                <i class="fas fa-fw fa-exchange-alt me-2"></i> Transaksi
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ str_contains($currentPath, 'keuangan') ? 'active' : '' }}" href="{{ url('/admin/keuangan') }}">
                <i class="fas fa-fw fa-hand-holding-usd me-2"></i> Denda & Keuangan
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ str_contains($currentPath, 'laporan') ? 'active' : '' }}" href="{{ url('/admin/laporan') }}">
                <i class="fas fa-fw fa-chart-line me-2"></i> Laporan
            </a>
        </li>

        <hr class="sidebar-divider my-0 bg-secondary">

        <li class="nav-item">
            <a class="nav-link" href="#" onclick="alert('Simulasi: Logout')">
                <i class="fas fa-fw fa-sign-out-alt me-2"></i> Logout
            </a>
        </li>

    </ul>
</div>

<div class="main-content">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- Memuat script spesifik dari halaman lain --}}
@yield('scripts')

{{-- Tombol Kembali ke Dashboard (Jika halaman lain menggunakannya) --}}
@if (!str_contains($currentPath, 'dashboard'))
    <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary back-to-dashboard-btn" title="Kembali ke Dashboard">
        <i class="fas fa-arrow-left"></i>
    </a>
@endif
</body>
</html>
