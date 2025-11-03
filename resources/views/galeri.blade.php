@extends('layouts.app')

@section('content')
    <section class="py-24 text-center relative overflow-hidden">
        <!-- 🌿 Latar belakang mengikuti gaya welcome -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-gray-900/60 to-black/70 backdrop-blur-md -z-10">
        </div>

        <div class="max-w-7xl mx-auto px-6" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-8 text-white drop-shadow-lg">
                🎥 Galeri Dokumentasi Sapi
            </h2>

            <p class="text-lg text-gray-200 mb-14 max-w-3xl mx-auto leading-relaxed">
                Saksikan berbagai aktivitas di <span class="text-white font-semibold">LINO FARM</span> — mulai dari proses
                perawatan, pemberian pakan, hingga kegiatan harian sapi kami.
            </p>

            <!-- 🎥 Galeri Video -->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">
                @php
                    $path = public_path('video'); // lokasi folder video
                    $files = glob($path . '/*.mp4'); // ambil semua file .mp4
                @endphp

                @foreach ($files as $file)
                    @php
                        $filename = basename($file); // ambil nama file saja
                        $tanggal = date('F Y', filemtime($file)); // ambil tanggal modifikasi file
                    @endphp

                    <div class="relative aspect-video rounded-3xl overflow-hidden shadow-xl border border-white/10 bg-white/5 backdrop-blur-lg group"
                        data-aos="zoom-in">
                        <video controls
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <source src="{{ asset('video/' . $filename) }}" type="video/mp4">
                        </video>

                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                            <p class="text-gray-300 text-xs italic">{{ $tanggal }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-16">
                <a href="{{ url('/') }}"
                    class="bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-lg shadow-lg backdrop-blur-sm transition">
                    ⬅️ Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>
    <!-- 🎬 Responsif video agar tidak terlalu zoom -->
    <style>
        /* Tambahkan latar belakang hitam agar video tetap proporsional */
        video {
            background-color: black;
        }
    </style>

    <script>
        // Fungsi untuk menyesuaikan tampilan video sesuai orientasi layar
        function adjustVideoDisplay() {
            const videos = document.querySelectorAll('video');
            const isLandscape = window.innerWidth > window.innerHeight;

            videos.forEach(video => {
                if (isLandscape) {
                    video.classList.remove('object-cover');
                    video.classList.add('object-contain');
                } else {
                    video.classList.remove('object-contain');
                    video.classList.add('object-cover');
                }
            });
        }

        // Jalankan fungsi saat pertama kali dan ketika orientasi berubah
        window.addEventListener('resize', adjustVideoDisplay);
        window.addEventListener('orientationchange', adjustVideoDisplay);
        document.addEventListener('DOMContentLoaded', adjustVideoDisplay);
    </script>
@endsection