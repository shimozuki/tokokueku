<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Toko Kue</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #fff8f6;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="text-[#5b2d2d] overflow-x-hidden">

    <!-- Navbar -->
    <nav class="max-w-7xl mx-auto px-8 py-6 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <div class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center text-2xl">
                🍰
            </div>

            <div>
                <h1 class="text-2xl font-bold">
                    Toko Kue
                </h1>
            </div>
        </div>

        <nav class="hidden lg:flex items-center gap-10">

            <a href="{{ route('home') }}"
                class="font-semibold pb-1 transition
        {{ request()->routeIs('home') ? 'text-pink-500 border-b-2 border-pink-500' : 'hover:text-pink-500' }}">

                Home

            </a>

            <a href="{{ route('cakes') }}"
                class="font-semibold pb-1 transition
        {{ request()->routeIs('cakes') ? 'text-pink-500 border-b-2 border-pink-500' : 'hover:text-pink-500' }}">

                Cakes

            </a>


            <a href="{{ route('about') }}"
                class="font-semibold pb-1 transition
        {{ request()->routeIs('about') ? 'text-pink-500 border-b-2 border-pink-500' : 'hover:text-pink-500' }}">

                About Us

            </a>

            <a href="{{ route('contact') }}"
                class="font-semibold pb-1 transition
        {{ request()->routeIs('contact') ? 'text-pink-500 border-b-2 border-pink-500' : 'hover:text-pink-500' }}">

                Contact

            </a>

        </nav>

        <div class="hidden md:flex items-center gap-4">

            <!-- cart -->
            <button
                class="w-14 h-14 rounded-full bg-white border border-pink-100 shadow-md hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-center text-2xl">

                👜

            </button>

            @if(auth('moonshine')->check())

            <!-- avatar -->
            <div
                class="w-14 h-14 rounded-full bg-gradient-to-r from-pink-500 to-[#a44c63] text-white flex items-center justify-center shadow-md font-bold text-2xl">

                {{ strtoupper(substr(auth('moonshine')->user()->name, 0, 1)) }}

            </div>

            <!-- logout -->
            <form method="POST" action="/admin/logout">

                @csrf

                <button
                    class="w-14 h-14 rounded-full bg-white border border-pink-100 shadow-md hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-center text-2xl">

                    📤

                </button>

            </form>

            @else

            <!-- login -->
            <a href="/admin/login"
                class="h-14 px-6 rounded-full bg-white border border-pink-100 shadow-md hover:shadow-xl hover:-translate-y-1 transition flex items-center gap-3">

                <span class="text-2xl">
                    👤
                </span>

                <span class="font-semibold text-[#5b2d2d]">
                    Login
                </span>

            </a>

            @endif

        </div>

    </nav>

    @yield('content')

    <!-- FOOTER -->
    <footer class="relative overflow-hidden bg-gradient-to-br from-[#5b2d2d] to-[#7b2c3b] text-white mt-24">

        <!-- blur decoration -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-pink-400/20 rounded-full blur-3xl"></div>

        <div class="max-w-[1400px] mx-auto px-8 lg:px-16 py-20 relative z-10">

            <!-- top -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-14 mb-16">

                <!-- brand -->
                <div>

                    <div class="flex items-center gap-4 mb-6">

                        <div class="w-14 h-14 rounded-full bg-pink-200 text-2xl flex items-center justify-center">
                            🍰
                        </div>

                        <div>

                            <h2 class="text-3xl font-bold">
                                Toko Kue
                            </h2>

                            <p class="text-pink-200 text-sm">
                                Sweet & Delicious
                            </p>

                        </div>

                    </div>

                    <p class="text-pink-100 leading-relaxed mb-6">
                        Menyediakan berbagai pilihan cake premium dengan desain cantik,
                        rasa lembut, dan dibuat fresh setiap hari.
                    </p>

                    <!-- social -->
                    <div class="flex items-center gap-4">

                        <a href="#"
                            class="w-12 h-12 rounded-full bg-white/10 hover:bg-pink-400 transition flex items-center justify-center text-xl">
                            📷
                        </a>

                        <a href="#"
                            class="w-12 h-12 rounded-full bg-white/10 hover:bg-pink-400 transition flex items-center justify-center text-xl">
                            🎵
                        </a>

                        <a href="#"
                            class="w-12 h-12 rounded-full bg-white/10 hover:bg-pink-400 transition flex items-center justify-center text-xl">
                            📘
                        </a>

                    </div>

                </div>

                <!-- menu -->
                <div>

                    <h3 class="text-2xl font-semibold mb-6">
                        Menu
                    </h3>

                    <div class="flex flex-col gap-4 text-pink-100">

                        <a href="/" class="hover:text-white transition">
                            Home
                        </a>

                        <a href="#products" class="hover:text-white transition">
                            Cakes
                        </a>

                        <a href="#" class="hover:text-white transition">
                            About Us
                        </a>

                        <a href="#" class="hover:text-white transition">
                            Contact
                        </a>

                    </div>

                </div>

                <!-- category -->
                <div>

                    <h3 class="text-2xl font-semibold mb-6">
                        Category
                    </h3>

                    <div class="flex flex-col gap-4 text-pink-100">

                        <a href="#" class="hover:text-white transition">
                            Birthday Cake
                        </a>

                        <a href="#" class="hover:text-white transition">
                            Wedding Cake
                        </a>

                        <a href="#" class="hover:text-white transition">
                            Cup Cake
                        </a>

                        <a href="#" class="hover:text-white transition">
                            Dessert
                        </a>

                    </div>

                </div>

                <!-- contact -->
                <div>

                    <h3 class="text-2xl font-semibold mb-6">
                        Contact
                    </h3>

                    <div class="flex flex-col gap-5 text-pink-100">

                        <div class="flex items-start gap-4">

                            <div class="text-2xl">
                                📍
                            </div>

                            <div>
                                Jl. Bungkarno Lintas Sernu Kerato <br>
                                West Nusa Tenggara, Indonesia
                            </div>

                        </div>

                        <div class="flex items-center gap-4">

                            <div class="text-2xl">
                                📞
                            </div>

                            <div>
                                +62 812 3456 7890
                            </div>

                        </div>

                        <div class="flex items-center gap-4">

                            <div class="text-2xl">
                                ✉️
                            </div>

                            <div>
                                tokokue@example.com
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- divider -->
            <div class="border-t border-white/10 pt-8">

                <div class="flex flex-col md:flex-row items-center justify-between gap-5">

                    <div class="text-pink-200 text-sm">
                        © 2025 Toko Kue. All rights reserved.
                    </div>

                    <div class="flex items-center gap-6 text-sm text-pink-200">

                        <a href="#" class="hover:text-white transition">
                            Privacy Policy
                        </a>

                        <a href="#" class="hover:text-white transition">
                            Terms & Condition
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </footer>

</body>

</html>