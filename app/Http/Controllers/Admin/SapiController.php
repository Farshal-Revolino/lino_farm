<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Digunakan untuk menghapus/menyimpan gambar

class SapiController extends Controller
{
    /**
     * Tampilkan daftar Sapi, dibagi berdasarkan sapistock (Index).
     */
    public function index()
    {
        $sapi = Sapi::orderBy('nama', 'asc')->get();

        $sapi_ready = $sapi->where('sapistock', 'ready');
        $sapi_terjual = $sapi->where('sapistock', 'terjual');

        return view('admin.sapi.index', compact('sapi_ready', 'sapi_terjual'));
    }

    /**
     * Form tambah sapi baru.
     */
    public function create()
    {
        return view('admin.sapi.create');
    }

    /**
     * Simpan sapi baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'umur' => 'required|numeric|min:0',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'sapistock' => 'required|in:ready,terjual',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('sapi_photos', 'public');
            $validatedData['gambar'] = $path;
        }

        Sapi::create($validatedData);

        return redirect()->route('admin.sapi.index')
                         ->with('success', 'Data Sapi dan foto berhasil ditambahkan.');
    }

    /**
     * Form edit sapi.
     */
    public function edit($id)
    {
        $sapi = Sapi::findOrFail($id);
        return view('admin.sapi.edit', compact('sapi'));
    }

    /**
     * Update sapi yang ada.
     */
    public function update(Request $request, $id)
    {
        $sapi = Sapi::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'umur' => 'required|numeric|min:0',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'sapistock' => 'required|in:ready,terjual',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($sapi->gambar && Storage::disk('public')->exists($sapi->gambar)) {
                Storage::disk('public')->delete($sapi->gambar);
            }

            $path = $request->file('gambar')->store('sapi_photos', 'public');
            $validatedData['gambar'] = $path;
        }

        $sapi->update($validatedData);

        return redirect()->route('admin.sapi.index')
                         ->with('success', 'Data Sapi berhasil diperbarui.');
    }

    /**
     * Hapus sapi dari database.
     */
    public function destroy($id)
    {
        $sapi = Sapi::findOrFail($id);

        if ($sapi->gambar && Storage::disk('public')->exists($sapi->gambar)) {
            Storage::disk('public')->delete($sapi->gambar);
        }

        $sapi->delete();

        return redirect()->route('admin.sapi.index')
                         ->with('success', 'Data Sapi berhasil dihapus.');
    }

    /**
     * Ubah status sapi menjadi "terjual".
     */
    public function jual($id)
    {
        $sapi = Sapi::findOrFail($id);
        $sapi->sapistock = 'terjual';
        $sapi->save();

        return redirect()->route('admin.sapi.index')
                         ->with('success', 'Status sapi berhasil diubah menjadi TERJUAL.');
    }
}
    