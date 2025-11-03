<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // Kirim email
        Mail::raw($request->pesan, function ($message) use ($request) {
            $message->to('farshal1810@gmail.com') // tujuan email (bisa diganti)
                    ->subject('Pesan dari: ' . $request->nama)
                    ->from($request->email, $request->nama);
        });

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
