@extends('layout.app')

@section('title', 'Admin - Denda & Keuangan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <h1 class="h3 text-primary mb-0">💰 Denda & Keuangan</h1>
            <p class="text-muted small">Kelola data denda, riwayat keterlambatan, dan pembayaran denda.</p>
        </div>
        <div class="card-body">

            <ul class="nav nav-tabs mb-4" id="keuanganTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="data-denda-tab" data-bs-toggle="tab" data-bs-target="#dataDenda" type="button" role="tab" aria-controls="dataDenda" aria-selected="true">
                        Data Denda (Outstanding)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pembayaran-denda-tab" data-bs-toggle="tab" data-bs-target="#pembayaranDenda" type="button" role="tab" aria-controls="pembayaranDenda" aria-selected="false">
                        Form Pembayaran Denda
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="riwayat-denda-tab" data-bs-toggle="tab" data-bs-target="#riwayatDenda" type="button" role="tab" aria-controls="riwayatDenda" aria-selected="false">
                        Riwayat Denda Keterlambatan
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="keuanganTabContent">

                <div class="tab-pane fade show active" id="dataDenda" role="tabpanel" aria-labelledby="data-denda-tab">
                    <h3>Data Denda (Belum Dibayar)</h3>
                    <div class="d-flex justify-content-end mb-3">
                        <input type="text" class="form-control w-50" placeholder="🔍 Cari denda berdasarkan ID/Nama Anggota...">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th>ID Denda</th>
                                <th>Anggota</th>
                                <th>Judul Buku</th>
                                <th>Tgl Kembali Seharusnya</th>
                                <th>Keterlambatan (Hari)</th>
                                <th>Total Denda</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- Simulasi Data Denda Outstanding --}}
                            @php
                                $dendaOutstanding = [
                                    ['id' => 'D001', 'anggota' => 'Budi S. (#A001)', 'judul' => 'Sistem Basis Data', 'tgl_kembali' => '2025-11-05', 'telat' => 8, 'total' => 8000, 'status' => 'Belum Lunas'],
                                    ['id' => 'D002', 'anggota' => 'Citra D. (#A005)', 'judul' => 'Novel Senja', 'tgl_kembali' => '2025-11-10', 'telat' => 3, 'total' => 3000, 'status' => 'Belum Lunas'],
                                ];
                            @endphp

                            @foreach ($dendaOutstanding as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['anggota'] }}</td>
                                    <td>{{ $item['judul'] }}</td>
                                    <td>{{ $item['tgl_kembali'] }}</td>
                                    <td><span class="badge bg-danger">{{ $item['telat'] }}</span> Hari</td>
                                    <td>**Rp {{ number_format($item['total'], 0, ',', '.') }}**</td>
                                    <td><span class="badge bg-warning text-dark">{{ $item['status'] }}</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-success" onclick="alert('Simulasi: Proses Pembayaran Denda {{ $item['id'] }}')">Bayar Sekarang</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-muted small mt-2">Total Denda Outstanding: **Rp {{ number_format(array_sum(array_column($dendaOutstanding, 'total')), 0, ',', '.') }}**</p>
                </div>

                <div class="tab-pane fade" id="pembayaranDenda" role="tabpanel" aria-labelledby="pembayaran-denda-tab">
                    <h3>Form Pembayaran Denda</h3>
                    <div class="alert alert-info" role="alert">
                        Form ini digunakan untuk mencatat pembayaran denda yang dilakukan oleh anggota.
                    </div>

                    <form onsubmit="event.preventDefault(); alert('Simulasi: Pembayaran denda berhasil dicatat!')">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="idAnggota" class="form-label">ID Anggota / Nama Anggota</label>
                                <input type="text" class="form-control" id="idAnggota" placeholder="Cari ID atau Nama Anggota..." required>
                                <small class="form-text text-muted">Akan menampilkan daftar denda anggota yang bersangkutan.</small>
                            </div>
                            <div class="col-md-6">
                                <label for="totalDenda" class="form-label">Total Denda Belum Lunas (Otomatis)</label>
                                <input type="text" class="form-control" id="totalDenda" value="Rp 11.000" disabled>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="jumlahBayar" class="form-label">Jumlah Pembayaran</label>
                                <input type="number" class="form-control" id="jumlahBayar" placeholder="Masukkan jumlah yang dibayar" required>
                            </div>
                            <div class="col-md-6">
                                <label for="metodeBayar" class="form-label">Metode Pembayaran</label>
                                <select id="metodeBayar" class="form-select" required>
                                    <option value="">Pilih...</option>
                                    <option>Tunai</option>
                                    <option>Transfer Bank</option>
                                    <option>QRIS</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Catat Pembayaran & Keluarkan Kwitansi</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="riwayatDenda" role="tabpanel" aria-labelledby="riwayat-denda-tab">
                    <h3>Riwayat Denda Keterlambatan</h3>
                    <p class="text-muted">Menampilkan semua catatan denda, baik yang sudah lunas maupun yang belum (termasuk riwayat pembayaran).</p>

                    <div class="d-flex justify-content-between mb-3">
                        <button class="btn btn-outline-secondary" onclick="alert('Simulasi: Mencetak Laporan Denda/Keuangan')">🖨️ Cetak Laporan Denda/Keuangan Simple</button>
                        <input type="date" class="form-control w-25">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="bg-secondary text-white">
                            <tr>
                                <th>Tgl. Transaksi</th>
                                <th>ID Denda</th>
                                <th>Anggota</th>
                                <th>Buku</th>
                                <th>Total Denda</th>
                                <th>Tgl Lunas</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- Simulasi Riwayat Denda --}}
                            <tr>
                                <td>2025-11-13</td>
                                <td>D003</td>
                                <td>Diana S. (#A010)</td>
                                <td>Pemrograman Web Dasar</td>
                                <td>Rp 5.000</td>
                                <td>2025-11-13</td>
                                <td><span class="badge bg-success">Lunas</span></td>
                            </tr>
                            <tr>
                                <td>2025-11-01</td>
                                <td>D001</td>
                                <td>Budi S. (#A001)</td>
                                <td>Sistem Basis Data</td>
                                <td>Rp 8.000</td>
                                <td>(Belum)</td>
                                <td><span class="badge bg-warning text-dark">Belum Lunas</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div> </div>
    </div>
@endsection
