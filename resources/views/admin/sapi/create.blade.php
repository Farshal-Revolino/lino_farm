<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sapi Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <a href="{{ route('admin.sapi.index') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>
        <h1 class="mb-4">Tambah Sapi Baru</h1>

        <form action="{{ route('admin.sapi.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-light p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama/Kode Sapi</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama') }}" required>
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis" class="form-label">Jenis</label>
                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                        value="{{ old('jenis') }}" required>
                    @error('jenis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="umur" class="form-label">Umur (Bulan)</label>
                    <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur"
                        value="{{ old('umur') }}" required>
                    @error('umur')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="berat" class="form-label">Berat (Kg)</label>
                    <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat"
                        name="berat" value="{{ old('berat') }}" required>
                    @error('berat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" value="{{ old('harga') }}" required>
                    @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="sapistock" class="form-label">Status Stok</label>
                <select class="form-select @error('sapistock') is-invalid @enderror" id="sapistock" name="sapistock"
                    required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="ready" {{ old('sapistock') == 'ready' ? 'selected' : '' }}>Ready (Siap Jual)</option>
                    <option value="terjual" {{ old('sapistock') == 'terjual' ? 'selected' : '' }}>Terjual</option>
                </select>
                @error('sapistock')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Foto Sapi</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan Sapi</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>