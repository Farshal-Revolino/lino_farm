<?php
use Illuminate\Support\Facades\Route;
use App\Models\Sapi;
use App\Models\Contact;
use Illuminate\Http\Request;

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

Route::get('/about', function () {
    return view('about');
});

Route::get('/media', function () {
    return view('media');
});


Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

