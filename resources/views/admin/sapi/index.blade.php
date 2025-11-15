<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Sapi - Dark Mode</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style Dark Forest -->
    <style>
        body {
            background: linear-gradient(120deg, #1b4332, #081c15);
            color: #d1d5db;
            /* soft light gray */
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        /* Glass card */
        .dashboard-card {
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 14px;
            padding: 25px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #95d5b2 !important;
            /* soft green */
        }

        /* Tabs */
        .nav-tabs .nav-link {
            color: #a5d6a7;
        }

        .nav-tabs .nav-link.active {
            color: #ffffff;
            background-color: rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* Alerts */
        .alert {
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            border: none;
        }

        /* Buttons */
        .btn-primary {
            background-color: #2d6a4f;
            border: none;
        }

        .btn-primary:hover {
            background-color: #40916c;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-danger {
            background-color: #ef5350;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        /* Table */
        table {
            color: #d1d5db;
            /* soft gray */
        }

        table thead th {
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        table tbody td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .img-preview {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .badge.bg-success {
            background-color: #66bb6a;
            /* soft green */
        }

        .badge.bg-danger {
            background-color: #ef5350;
            /* soft red */
        }
    </style>
</head>

<body>
    <div class="container my-5 dashboard-card">
        <h1 class="mb-4">Dashboard Stok Sapi</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.sapi.create') }}" class="btn btn-primary mb-3">Tambah Sapi Baru</a>

        <!-- Tabs -->
        <ul class="nav nav-tabs" id="sapiTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="ready-tab" data-bs-toggle="tab" data-bs-target="#ready"
                    type="button" role="tab" aria-controls="ready" aria-selected="true">
                    Sapi Ready ({{ $sapi_ready->count() }})
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="terjual-tab" data-bs-toggle="tab" data-bs-target="#terjual" type="button"
                    role="tab" aria-controls="terjual" aria-selected="false">
                    Sapi Terjual ({{ $sapi_terjual->count() }})
                </button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="sapiTabContent">
            <!-- TAB SAPI READY -->
            <div class="tab-pane fade show active" id="ready" role="tabpanel" aria-labelledby="ready-tab">
                <table class="table align-middle text-white">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Umur</th>
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sapi_ready as $item)
                            <tr>
                                <td>
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto Sapi"
                                            class="img-preview rounded">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->umur }} tahun</td>
                                <td>{{ $item->berat }} kg</td>
                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge {{ $item->sapistock == 'ready' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($item->sapistock) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.sapi.edit', $item->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('admin.sapi.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-secondary"
                                            onclick="return confirm('Hapus sapi ini?')">Hapus</button>
                                    </form>

                                    @if ($item->sapistock == 'ready')
                                        <a href="{{ route('admin.sapi.jual', $item->id) }}" class="btn btn-sm btn-danger">Tandai
                                            Terjual</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Tidak ada data sapi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- TAB SAPI TERJUAL -->
            <div class="tab-pane fade" id="terjual" role="tabpanel" aria-labelledby="terjual-tab">
                <table class="table align-middle text-white">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Umur</th>
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sapi_terjual as $item)
                            <tr>
                                <td>
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto Sapi"
                                            class="img-preview rounded">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->umur }} tahun</td>
                                <td>{{ $item->berat }} kg</td>
                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-danger">Terjual</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.sapi.edit', $item->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('admin.sapi.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-secondary"
                                            onclick="return confirm('Hapus sapi ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Tidak ada data sapi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>