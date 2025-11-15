<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - LINO FARM</title>

    <!-- Tailwind & Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

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

        /* Animasi shake */
        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-6px);
            }

            50% {
                transform: translateX(6px);
            }

            75% {
                transform: translateX(-6px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .shake {
            animation: shake 0.4s ease;
        }
    </style>
</head>

<body class="dark-mode">

    <nav class="fixed w-full z-20 backdrop-blur-md bg-black/50 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-yellow-400">🐄 LINO FARM</h1>
        </div>
    </nav>

    <section class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="card w-full max-w-md p-8 rounded-2xl text-center" id="loginCard">

            <h2 class="text-3xl font-bold text-yellow-400 mb-6">Login Admin</h2>
            <p class="text-gray-300 mb-6">Silakan masuk untuk mengelola data sapi dan transaksi.</p>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                    {{ $errors->first() }}
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        document.getElementById("loginCard").classList.add("shake");
                        setTimeout(() => {
                            document.getElementById("loginCard").classList.remove("shake");
                        }, 600);
                    });
                </script>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4" id="loginForm">
                @csrf

                <!-- Email -->
                <div class="text-left">
                    <label for="email" class="block mb-2 font-semibold">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan email" required>
                </div>

                <!-- Password + Show/Hide -->
                <div class="text-left relative">
                    <label for="password" class="block mb-2 font-semibold">Password</label>

                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 pr-12 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan password" required>

                    <span id="togglePassword"
                        class="absolute right-3 top-11 transform -translate-y-1/2 cursor-pointer text-gray-300 text-lg">
                        👁️
                    </span>
                </div>

                <!-- Remember + Forgot -->
                <div class="flex justify-between items-center text-sm">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 rounded bg-gray-800 border-gray-600 text-green-500">
                        <span class="text-gray-300">Ingat Saya</span>
                    </label>

                    <a href="#" class="text-yellow-400 hover:underline"></a>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-black font-semibold px-4 py-2 rounded-lg transition"
                    id="submitBtn">
                    Login Sekarang
                </button>
            </form>

            <div class="mt-6 text-sm">
                <a href="/" class="text-gray-300 hover:text-yellow-400 transition">← Kembali ke Beranda</a>
            </div>
        </div>
    </section>

    <footer class="bg-black/70 text-center py-6 border-t border-gray-800 mt-12">
        <p class="text-gray-400">© 2025 LINO FARM | Admin Panel</p>
    </footer>

    <!-- SCRIPT TAMBAHAN -->
    <script>
        // Show / Hide Password
        const pwd = document.getElementById("password");
        const togglePwd = document.getElementById("togglePassword");

        togglePwd.addEventListener("click", () => {
            const type = pwd.type === "password" ? "text" : "password";
            pwd.type = type;
            togglePwd.textContent = type === "password" ? "👁️" : "🙈";
        });

        // Loading saat submit
        document.getElementById("loginForm").addEventListener("submit", () => {
            const btn = document.getElementById("submitBtn");
            btn.disabled = true;
            btn.textContent = "Memproses...";
            btn.classList.add("opacity-70");
        });
    </script>

</body>

</html>