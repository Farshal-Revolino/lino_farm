<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>🐄 LINO FARM - Jual Beli Sapi</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            position: relative;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #222;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: url('{{ asset('img/ladang.jpg') }}') center center/cover no-repeat fixed;
            z-index: -2;
            filter: brightness(0.6);
        }

        .dark-mode::before {
            content: "";
            position: fixed;
            inset: 0;
            background: url('{{ asset('img/ladang_malam.jpg') }}') center center/cover no-repeat fixed;
            z-index: -1;
            filter: brightness(0.8);
            opacity: 0.9;
            transition: opacity 0.8s ease-in-out;
        }

        .dark-mode {
            color: #eaeaea !important;
            transition: all 0.6s ease-in-out;
        }

        #darkModeToggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: 1px solid #fff;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 9999;
        }

        #darkModeToggle:hover {
            background: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>

<body class="bg-transparent">


    <!-- Navbar -->
    <header class="bg-bg-opacity-80 text-white py-4">
        <nav class="max-w-6xl mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-bold">🐄 LINO FARM</h1>
            <ul class="flex gap-6">
                <li><a href="{{ url('/') }}" class="hover:text-yellow-300"></a></li>
                <li><a href="{{ url('/about') }}" class="hover:text-yellow-300"></a></li>
                <li><a href="{{ url('/media') }}" class="hover:text-yellow-300"></a></li>
                <li><a href="{{ url('/contact') }}" class="hover:text-yellow-300"></a></li>
            </ul>
        </nav>
    </header>

    <!-- Konten halaman -->
    <main class="pt-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-transprent-900 bg-opacity-80 text-white text-center py-6 mt-10">
        <p class="text-white-400">© 2025 LINO FARM | Platform Jual Beli Sapi Indonesia</p>
    </footer>

    <script>
        const toggle = document.getElementById('darkModeToggle');
        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>

</html>