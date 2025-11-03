@extends('layouts.app')

@section('content')
<section class="py-16 text-center bg-gray-50 bg-opacity-80 rounded-xl mx-4">
    <h2 class="text-3xl font-semibold mb-10 text-green-700">Galeri Video Peternakan</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
        <video controls class="rounded-2xl shadow-lg w-full max-w-lg mx-auto">
            <source src="{{ asset('video/pedet.mp4') }}" type="video/mp4">
        </video>