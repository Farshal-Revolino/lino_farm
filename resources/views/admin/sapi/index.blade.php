<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Sapi</title>
    <!-- Asumsikan Anda menggunakan Tailwind atau Bootstrap di sini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-preview {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4">Dashboard Stok Sapi</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.sapi.create') }}" class="btn btn-primary mb-3">Tambah Sapi Baru</a>

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

        <div class="tab-content" id="sapiTabContent">
            <!-- TAB SAPI READY -->
            <div class="tab-pane fade show active" id="ready" role="tabpanel" aria-labelledby="ready-tab">
                @include('admin.sapi.partials.table', ['sapiList' => $sapi_ready])
            </div>

            <!-- TAB SAPI TERJUAL -->
            <div class="tab-pane fade" id="terjual" role="tabpanel" aria-labelledby="terjual-tab">
                @include('admin.sapi.partials.table', ['sapiList' => $sapi_terjual])
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>