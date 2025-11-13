<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
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
        @forelse ($sapiList as $item)
            <tr>
                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto Sapi" class="img-preview rounded">
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
                    <a href="{{ route('admin.sapi.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('admin.sapi.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-secondary" onclick="return confirm('Hapus sapi ini?')">Hapus</button>
                    </form>

                    <!-- 🔴 Tombol Tandai Terjual (Hanya muncul kalau statusnya ready) -->
                    @if ($item->sapistock == 'ready')
                        <a href="{{ route('admin.sapi.jual', $item->id) }}" class="btn btn-sm btn-danger">
                            Tandai Terjual
                        </a>
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