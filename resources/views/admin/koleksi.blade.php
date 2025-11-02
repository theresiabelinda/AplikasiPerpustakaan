@extends('layout.app')

@section('title', 'Manajemen Koleksi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <h1 class="h3 text-primary mb-0">📚 Manajemen Koleksi</h1>
            <p class="text-muted small">Kelola Data buku, Kategori, dan Rak buku.</p>
        </div>
        <div class="card-body">

            <ul class="nav nav-tabs mb-4" id="koleksiTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="buku-tab" data-bs-toggle="tab" data-bs-target="#dataBuku" type="button" role="tab" aria-controls="dataBuku" aria-selected="true">
                        Data Buku
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="kategori-tab" data-bs-toggle="tab" data-bs-target="#kategoriBuku" type="button" role="tab" aria-controls="kategoriBuku" aria-selected="false">
                        Kategori Buku
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rak-tab" data-bs-toggle="tab" data-bs-target="#rakBuku" type="button" role="tab" aria-controls="rakBuku" aria-selected="false">
                        Rak Buku
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="koleksiTabContent">

                <div class="tab-pane fade show active" id="dataBuku" role="tabpanel" aria-labelledby="buku-tab">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button class="btn btn-success" onclick="alert('Simulasi: Form Tambah Buku terbuka.')">
                            <i class="bi bi-plus-circle"></i> ➕ Tambah Buku Baru
                        </button>
                        <div class="input-group w-50">
                            <input type="text" class="form-control" placeholder="🔍 Cari buku (judul, pengarang, dll...)" onchange="alert('Simulasi: Mencari buku dengan keyword: ' + this.value)">
                            <button class="btn btn-outline-secondary" type="button">Cari</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Kategori</th>
                                <th>Lokasi (Rak)</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- Simulasi Data menggunakan Blade @foreach --}}
                            @php
                                $buku = [
                                    ['id' => 'B001', 'judul' => 'Laravel 10 Handbook', 'pengarang' => 'A. Budi', 'kategori' => 'Edukasi', 'rak' => 'A-01', 'status' => 'Tersedia'],
                                    ['id' => 'B002', 'judul' => 'Si Kancil Anak Nakal', 'pengarang' => 'P. Candra', 'kategori' => 'Fiksi', 'rak' => 'B-05', 'status' => 'Tersedia'],
                                    ['id' => 'B003', 'judul' => 'Kisah Para Nabi', 'pengarang' => 'S. Dewi', 'kategori' => 'Religi', 'rak' => 'C-10', 'status' => 'Dipinjam'],
                                ];
                            @endphp

                            @foreach ($buku as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['judul'] }}</td>
                                    <td>{{ $item['pengarang'] }}</td>
                                    <td><span class="badge bg-info">{{ $item['kategori'] }}</span></td>
                                    <td>{{ $item['rak'] }}</td>
                                    <td>
                                        @if ($item['status'] == 'Tersedia')
                                            <span class="badge bg-success">{{ $item['status'] }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark">{{ $item['status'] }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info text-white" onclick="alert('Simulasi: Lihat Detail {{ $item['id'] }}')">Detail</button>
                                            <button class="btn btn-sm btn-primary" onclick="alert('Simulasi: Edit {{ $item['id'] }}')">Edit</button>
                                            <button class="btn btn-sm btn-danger" onclick="confirm('Yakin hapus {{ $item['id'] }}?')">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-muted small mt-2">Menampilkan {{ count($buku) }} dari {{ count($buku) }} Data Buku (Simulasi)</p>
                </div>

                <div class="tab-pane fade" id="kategoriBuku" role="tabpanel" aria-labelledby="kategori-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="inputKategori" placeholder="Nama Kategori Baru">
                                <button class="btn btn-success" type="button" onclick="addListItem('inputKategori', 'listKategori', 'Kategori')">
                                    ➕ Tambah Kategori
                                </button>
                            </div>

                            <ul class="list-group" id="listKategori">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Fiksi
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" onclick="alert('Edit Fiksi')">Edit</button>
                                        <button class="btn btn-sm btn-danger" onclick="confirm('Hapus Kategori Fiksi?')">Hapus</button>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Non-Fiksi
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" onclick="alert('Edit Non-Fiksi')">Edit</button>
                                        <button class="btn btn-sm btn-danger" onclick="confirm('Hapus Kategori Non-Fiksi?')">Hapus</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="rakBuku" role="tabpanel" aria-labelledby="rak-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="inputRak" placeholder="Kode Lokasi (Contoh: A-01)">
                                <button class="btn btn-success" type="button" onclick="addListItem('inputRak', 'listRak', 'Rak')">
                                    ➕ Tambah Rak
                                </button>
                            </div>
                            <ul class="list-group" id="listRak">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A-01 (Edukasi)
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" onclick="alert('Edit Rak A-01')">Edit</button>
                                        <button class="btn btn-sm btn-danger" onclick="confirm('Hapus Rak A-01?')">Hapus</button>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    B-05 (Fiksi)
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" onclick="alert('Edit Rak B-05')">Edit</button>
                                        <button class="btn btn-sm btn-danger" onclick="confirm('Hapus Rak B-05?')">Hapus</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div> </div>
    </div>
@endsection

@section('scripts')
    <script>
        // JavaScript simulasi tambah item list (tanpa database, menggunakan DOM)
        function addListItem(inputId, listId, itemName) {
            var input = document.getElementById(inputId);
            var list = document.getElementById(listId);
            var itemText = input.value.trim();

            if (itemText === "") {
                alert(itemName + " tidak boleh kosong!");
                return;
            }

            var newLi = document.createElement("li");
            newLi.className = "list-group-item d-flex justify-content-between align-items-center";
            newLi.innerHTML = itemText +
                '<div class="btn-group">' +
                '<button class="btn btn-sm btn-primary" onclick="alert(\'Edit ' + itemText + '\')">Edit</button>' +
                '<button class="btn btn-sm btn-danger" onclick="this.parentNode.parentNode.remove()">Hapus</button>' +
                '</div>';

            list.appendChild(newLi);
            input.value = "";
            alert(itemName + ' "' + itemText + '" berhasil ditambahkan (simulasi)!');
        }
    </script>
@endsection
