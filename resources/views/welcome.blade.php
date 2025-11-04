<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LINO FARM - Jual Beli Sapi</title>

  <!-- Tailwind & Font -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: url('{{ asset('img/ladang.jpg') }}') center center/cover no-repeat fixed;
      z-index: -1;
      filter: brightness(0.6);
    }

    section,
    nav,
    footer,
    .card,
    form,
    input,
    textarea,
    select {
      background: transparent !important;
      backdrop-filter: blur(6px);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    a,
    label {
      color: #fff !important;
      text-shadow: 0 1px 3px rgba(0, 0, 0, 0.6);
    }

    .card {
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: url('{{ asset('img/ladang.jpg') }}') center center/cover no-repeat fixed;
    }

    .dark-mode {
      background-color: #0f0f0f;
      color: #f1f1f1;
    }
  </style>
</head>

<body class="dark-mode">

  <!-- Navbar -->
  <nav class="fixed w-full z-20 backdrop-blur-md bg-black/50 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
      <!-- Logo -->
      <h1 class="text-2xl font-bold text-yellow-400">🐄 LINO FARM</h1>

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-6">
        <a href="#about" class="hover:text-yellow-400 transition">Tentang</a>
        <a href="#services" class="hover:text-yellow-400 transition">Fitur</a>
        <a href="#cows" class="hover:text-yellow-400 transition">Daftar Sapi</a>
        <a href="#contact" class="hover:text-yellow-400 transition">Kontak</a>
        <a href="{{ route('galeri') }}" class="hover:text-yellow-400 transition">Galeri Kami</a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-button" class="md:hidden text-green-400 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-transparant/80 backdrop-blur-md border-t border-gray-700">
      <div class="px-6 py-4 space-y-4">
        <a href="#about" class="block text-white hover:text-yellow-400 transition">Tentang</a>
        <a href="#services" class="block text-white hover:text-yellow-400 transition">Fitur</a>
        <a href="#cows" class="block text-white hover:text-yellow-400 transition">Daftar Sapi</a>
        <a href="#contact" class="block text-white hover:text-yellow-400 transition">Kontak</a>
        <a href="{{ route('galeri') }}" class="block text-white hover:text-yellow-400 transition">Galeri Kami</a>
      </div>
    </div>
  </nav>

  <!-- JavaScript for Mobile Menu Toggle -->
  <script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>



  </div>
  </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative h-screen flex items-center justify-center text-center text-white overflow-hidden">
    <video autoplay loop muted playsinline class="absolute w-full h-full object-cover">
      <source src="https://cdn.coverr.co/videos/coverr-cows-in-the-field-4456/1080p.mp4" type="video/mp4">
    </video>

    <div class="absolute inset-0 bg-transparent"></div>

    <div class="relative z-10 px-6" data-aos="fade-up">
      <h1 class="text-5xl md:text-6xl font-bold mb-4 text-yellow-400">Temukan Sapi Terbaikmu Hari Ini 🐮</h1>
      <p class="max-w-2xl mx-auto text-lg text-gray-200">
        Platform jual beli sapi online terpercaya langsung dari peternaknya.
      </p>
      <a href="#cows"
        class="mt-8 inline-block bg-green-500 hover:bg-green-600 text-black px-6 py-3 rounded-lg font-semibold">
        Lihat Daftar Sapi Yang Tersedia
      </a>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="py-20 px-6 md:px-20 bg-gradient-to-b from-black via-gray-900 to-black text-center"
    data-aos="fade-up">
    <h3 class="text-3xl font-bold mb-6 text-yellow-400">Tentang LINO FARM</h3>
    <p class="text-lg text-gray-300 max-w-3xl mx-auto leading-relaxed">
      LINO FARM adalah platform jual beli sapi online yang memudahkan siapa pun untuk menemukan sapi terbaik langsung
      dari peternaknya.
    </p>
  </section>

  <!-- Fitur -->
  <section id="services" class="py-20 px-6 bg-black text-center">
    <h3 class="text-3xl font-bold mb-12 text-yellow-400">Fitur Unggulan Kami</h3>
    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <div class="card p-6 rounded-2xl" data-aos="zoom-in">
        <h4 class="text-xl font-bold text-yellow-400 mb-2">📊 Penilaian Cerdas</h4>
        <p class="text-gray-300">Algoritma menilai kualitas sapi secara otomatis berdasarkan data akurat.</p>
      </div>
      <div class="card p-6 rounded-2xl" data-aos="zoom-in" data-aos-delay="100">
        <h4 class="text-xl font-bold text-yellow-400 mb-2">📱 Responsif & Cepat</h4>
        <p class="text-gray-300">Desain modern yang optimal di semua perangkat.</p>
      </div>
      <div class="card p-6 rounded-2xl" data-aos="zoom-in" data-aos-delay="200">
        <h4 class="text-xl font-bold text-yellow-400 mb-2">💬 Chat Langsung</h4>
        <p class="text-gray-300">Hubungi peternak langsung tanpa perantara.</p>
      </div>
    </div>
  </section>

  <!-- Daftar Sapi (Dinamis dari Database) -->
  <section id="cows" class="py-20 px-6 bg-gradient-to-b from-black via-gray-900 to-black text-center">
    <h3 class="text-3xl font-bold mb-12 text-yellow-400">Daftar Sapi Yang Tersedia </h3>

    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      @foreach($sapi as $item)
        <div class="card p-6 rounded-2xl text-left" data-aos="fade-up">
          <img src="{{ asset('img/' . $item->gambar) }}" alt="{{ $item->nama }}"
            class="rounded-xl mb-4 w-full h-56 object-cover">
          <h4 class="text-xl font-bold text-yellow-400">{{ $item->nama }}</h4>
          <p class="text-gray-300">Berat: {{ $item->berat }}kg | Umur: {{ $item->umur }} tahun</p>
          <p class="text-yellow-400 font-bold mt-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
        </div>
      @endforeach
    </div>
  </section>


  <!-- Kontak -->
  <section id="contact" class="py-20 px-6 bg-gradient-to-b from-gray-900 to-black text-center" data-aos="fade-up">
    <h3 class="text-3xl font-bold mb-6 text-yellow-400">Hubungi Kami</h3>
    <p class="text-gray-300 mb-10">Ada pertanyaan? Kami siap membantu Anda!</p>
    <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-10">
      <form action="/contact" method="POST" class="card p-6 rounded-2xl text-left space-y-4">
        @csrf
        <div class="flex gap-4 mt-4">
          <!-- Tombol WhatsApp -->
          <a href="https://wa.me/6287787801972?text=Halo%20saya%20ingin%20bertanya" target="_blank"
            class="flex-1 bg-green-500 hover:bg-green-600 text-black px-4 py-2 rounded-lg text-center font-semibold">
            Chat via WhatsApp
          </a>

          <!-- Tombol Instagram -->
          <a href="https://instagram.com/rvlinno" target="_blank"
            class="flex-1 bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-center font-semibold">
            Chat via Instagram
          </a>
        </div>

        <input type="text" name="nama" placeholder="Nama Anda"
          class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white" required>

        <input type="email" name="email" placeholder="Email Anda"
          class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white" required>

        <textarea name="pesan" placeholder="Pesan" rows="4"
          class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white" required></textarea>

        <button type="submit"
          class="w-full bg-green-500 hover:bg-green-600 text-black font-semibold px-4 py-2 rounded-lg">
          Kirim Pesan
        </button>
      </form>

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.4135043477855!2d109.7354267236259!3d-7.720220569254731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7ac8eb3dddc587%3A0x46f85483e1b3a093!2sRM.%20Asli!5e0!3m2!1sen!2sid!4v1761244246650!5m2!1sen!2sid"
        width="100%" height="400" style="border:0; border-radius:12px;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black text-center py-6 border-t border-gray-800">
    <p class="text-gray-400">© 2025 LINO FARM | Platform Jual Beli Sapi Indonesia</p>
  </footer>

  <script>
    AOS.init();


    @if(session('success'))
      Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonColor: '#10B981',
        confirmButtonText: 'OK'
      });
    @endif
  </script>

  <script src="{{ asset('js/navbar.js') }}"></script>

</body>

</html>

</body>

</html>