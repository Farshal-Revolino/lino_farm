<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sapi: {{ $sapi->nama }}</title>
    {{-- Memuat Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h3 class="mb-0">Edit Data Sapi: **{{ $sapi->nama }}**</h3>
            </div>
            <div class="card-body">
                {{-- Form action diarahkan ke route update dengan method POST dan spoofing PUT --}}
                <form action="{{ route('admin.sapi.update', $sapi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama/Kode Sapi</label>
                            {{-- old() mempertahankan input jika ada error validasi --}}
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama', $sapi->nama) }}" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis" class="form-label">Jenis Sapi</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                                name="jenis" value="{{ old('jenis', $sapi->jenis) }}" required>
                            @error('jenis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="umur" class="form-label">Umur (Bulan)</label>
                            <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur"
                                name="umur" value="{{ old('umur', $sapi->umur) }}" min="0" required>
                            @error('umur')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="berat" class="form-label">Berat (Kg)</label>
                            <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat"
                                name="berat" value="{{ old('berat', $sapi->berat) }}" min="0" required>
                            @error('berat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="harga" class="form-label">Harga (Rp)</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                name="harga" value="{{ old('harga', $sapi->harga) }}" min="0" required>
                            @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sapistock" class="form-label">Status Stok</label>
                        <select class="form-select @error('sapistock') is-invalid @enderror" id="sapistock"
                            name="sapistock" required>
                            {{-- Pilihan harus sesuai dengan data lama sapi --}}
                            <option value="ready" {{ old('sapistock', $sapi->sapistock) == 'ready' ? 'selected' : '' }}>
                                Ready (Tersedia)</option>
                            <option value="terjual" {{ old('sapistock', $sapi->sapistock) == 'terjual' ? 'selected' : '' }}>Terjual</option>
                        </select>
                        @error('sapistock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Ganti Foto Sapi</label>

                        {{-- Tampilkan foto lama jika ada --}}
                        @if ($sapi->gambar)
                            <div class="mb-2">
                                <p class="text-muted small">Foto saat ini:</p>
                                <img src="{{ asset('storage/' . $sapi->gambar) }}" alt="Foto Sapi {{ $sapi->nama }}"
                                    style="max-width: 150px; height: auto; border-radius: 4px;">
                            </div>
                        @endif

                        {{-- Input file baru --}}
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                            name="gambar">
                        <div class="form-text">Kosongkan jika tidak ingin mengganti foto.</div>
                        @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <a href="{{ route('admin.sapi.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-info text-white">Update Data</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Memuat Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>