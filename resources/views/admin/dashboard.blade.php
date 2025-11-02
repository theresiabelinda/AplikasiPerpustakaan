@extends('layout.app')

@section('title', 'Dashboard Admin Perpustakaan')

@section('content')
    {{-- Konten ini otomatis akan diapit oleh <div class="main-content"> dan <div class="container-fluid"> dari layout/app.blade.php --}}

    <div class="py-4">
        <h1 class="h2 text-primary mb-4">🏠 Dashboard Admin</h1>
        <p class="text-muted">Ringkasan cepat status koleksi, anggota, dan aktivitas perpustakaan.</p>

        {{-- Tampilkan pesan jika ada (dari route dummy) --}}
        @if (isset($message))
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle me-2"></i> {{ $message }}
            </div>
        @endif

        <div class="row mb-5">

            {{-- Total Buku Tersedia --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-start border-5 border-success h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col me-2">
                                <div class="text-xs fw-bold text-success text-uppercase mb-1">Total Buku Tersedia</div>
                                <div class="h5 mb-0 fw-bold text-gray-800">4,521</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Anggota Aktif --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-start border-5 border-info h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col me-2">
                                <div class="text-xs fw-bold text-info text-uppercase mb-1">Anggota Aktif</div>
                                <div class="h5 mb-0 fw-bold text-gray-800">1,204</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Buku Sedang Dipinjam --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-start border-5 border-warning h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col me-2">
                                <div class="text-xs fw-bold text-warning text-uppercase mb-1">Buku Sedang Dipinjam</div>
                                <div class="h5 mb-0 fw-bold text-gray-800">189</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-exchange-alt fa-2x text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Denda Terlambat --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-start border-5 border-danger h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col me-2">
                                <div class="text-xs fw-bold text-danger text-uppercase mb-1">Denda Terlambat (Outstanding)</div>
                                <div class="h5 mb-0 fw-bold text-gray-800">Rp 125.000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sack-dollar fa-2x text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3 bg-light">
                        <h6 class="m-0 fw-bold text-primary">Aktivitas Peminjaman Terkini</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="badge bg-success me-2"><i class="fas fa-arrow-up"></i> Pinjam</span> Anggota **#A1002** meminjam 'Sejarah Web Modern'.
                                <small class="text-muted float-end">5 menit lalu</small>
                            </li>
                            <li class="list-group-item">
                                <span class="badge bg-primary me-2"><i class="fas fa-arrow-down"></i> Kembali</span> Anggota **#A1015** mengembalikan 'Teknik SEO Dasar'.
                                <small class="text-muted float-end">1 jam lalu</small>
                            </li>
                            <li class="list-group-item">
                                <span class="badge bg-danger me-2"><i class="fas fa-exclamation-circle"></i> Denda</span> Anggota **#A0998** dikenakan denda keterlambatan Rp 5.000.
                                <small class="text-muted float-end">2 jam lalu</small>
                            </li>
                            <li class="list-group-item text-center">
                                <a href="{{ url('/admin/transaksi') }}" class="btn btn-sm btn-outline-primary">Lihat Semua Transaksi &rarr;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3 bg-light">
                        <h6 class="m-0 fw-bold text-primary">📚 Buku Paling Sering Dipinjam</h6>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Panduan Laravel 10 (Edukasi)</div>
                                    Dipinjam: 45 kali
                                </div>
                                <span class="badge bg-primary rounded-pill">#1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Novel: Senja di Pelabuhan (Fiksi)</div>
                                    Dipinjam: 38 kali
                                </div>
                                <span class="badge bg-secondary rounded-pill">#2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Manajemen Keuangan Pribadi (Non-Fiksi)</div>
                                    Dipinjam: 32 kali
                                </div>
                                <span class="badge bg-secondary rounded-pill">#3</span>
                            </li>
                        </ol>
                        <div class="text-center mt-3">
                            <a href="{{ url('/admin/laporan') }}" class="btn btn-sm btn-outline-info">Lihat Semua Laporan &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
