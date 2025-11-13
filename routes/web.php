<?php

use Illuminate\Support\Facades\Route;
use App\Models\Sapi;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\SapiController;
use App\Http\Controllers\AuthController;

// ==========================
// Halaman Utama (Publik)
// ==========================
Route::get('/', function () {
    $sapi = Sapi::all();
    return view('welcome', compact('sapi'));
});

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'nama' => 'required|string|max:100',
        'email' => 'required|email',
        'pesan' => 'required|string',
    ]);

    Contact::create($validated);
    return back()->with('success', 'Pesan berhasil terkirim');
});

Route::get('/about', fn() => view('about'));
Route::get('/media', fn() => view('media'));
Route::get('/galeri', fn() => view('galeri'))->name('galeri');

// ==========================
// Form Login & Proses Login
// ==========================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// Route Admin (Dashboard)
// ==========================
Route::prefix('admin')->name('admin.')->group(function () {
    // CRUD sapi
    Route::resource('sapi', SapiController::class);

    // Dashboard default
    Route::get('/', function () {
        return redirect()->route('admin.sapi.index');
    })->name('dashboard');

    // ✅ Route untuk menandai sapi terjual
    Route::get('/sapi/jual/{id}', [SapiController::class, 'jual'])->name('sapi.jual');
});
