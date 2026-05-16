@extends('frontend.layouts.app')

@section('content')

<!-- HERO -->
<section class="relative overflow-hidden py-24 bg-[#fff8f6]">

    <!-- blur -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-pink-200/30 rounded-full blur-3xl"></div>

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT -->
            <div>

                <span class="bg-pink-100 text-pink-500 px-5 py-2 rounded-full font-medium inline-block mb-8">
                    🍰 About Our Bakery
                </span>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-[#5b2d2d] leading-tight mb-8">

                    Sweet Moments
                    Begin With
                    <span class="text-pink-500">
                        Delicious Cake
                    </span>

                </h1>

                <p class="text-gray-500 text-xl leading-relaxed mb-10">

                    Toko Kue hadir untuk menghadirkan kebahagiaan melalui
                    cake premium dengan rasa lembut, tampilan cantik,
                    dan dibuat fresh setiap hari untuk momen spesial Anda.

                </p>

                <!-- stats -->
                <div class="flex flex-wrap gap-10">

                    <div>

                        <div class="text-4xl font-bold text-pink-500 mb-2">
                            1000+
                        </div>

                        <div class="text-gray-500">
                            Happy Customer
                        </div>

                    </div>

                    <div>

                        <div class="text-4xl font-bold text-pink-500 mb-2">
                            100+
                        </div>

                        <div class="text-gray-500">
                            Cake Variant
                        </div>

                    </div>

                    <div>

                        <div class="text-4xl font-bold text-pink-500 mb-2">
                            5+
                        </div>

                        <div class="text-gray-500">
                            Years Experience
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="relative">

                <!-- bg -->
                <div class="absolute inset-0 bg-gradient-to-br from-pink-200 to-[#ddb3bb] rounded-[60px] rotate-3"></div>

                <!-- image -->
                <div class="relative bg-white p-6 rounded-[60px] shadow-2xl">

                    <img
                        src="https://images.unsplash.com/photo-1559620192-032c4bc4674e?q=80&w=1200&auto=format&fit=crop"
                        class="w-full h-[600px] object-cover rounded-[40px]">

                </div>

            </div>

        </div>

    </div>

</section>

<!-- STORY -->
<section class="py-24">

    <div class="max-w-[1200px] mx-auto px-8">

        <div class="text-center mb-20">

            <span class="bg-pink-100 text-pink-500 px-5 py-2 rounded-full font-medium inline-block mb-6">
                ✨ Our Story
            </span>

            <h2 class="text-5xl font-bold text-[#5b2d2d] mb-6">
                Dibuat Dengan Cinta
            </h2>

            <p class="text-gray-500 text-xl max-w-3xl mx-auto leading-relaxed">

                Berawal dari hobi membuat cake rumahan,
                kini Toko Kue berkembang menjadi bakery premium
                yang dipercaya banyak pelanggan untuk menemani
                berbagai momen spesial mereka.

            </p>

        </div>

        <!-- cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- card -->
            <div class="bg-white rounded-[40px] p-10 shadow-lg hover:-translate-y-3 transition duration-300">

                <div class="w-20 h-20 rounded-full bg-pink-100 flex items-center justify-center text-4xl mb-8">
                    🎂
                </div>

                <h3 class="text-2xl font-bold text-[#5b2d2d] mb-4">
                    Premium Cake
                </h3>

                <p class="text-gray-500 leading-relaxed">
                    Menggunakan bahan premium berkualitas tinggi
                    untuk menghasilkan rasa terbaik.
                </p>

            </div>

            <!-- card -->
            <div class="bg-white rounded-[40px] p-10 shadow-lg hover:-translate-y-3 transition duration-300">

                <div class="w-20 h-20 rounded-full bg-pink-100 flex items-center justify-center text-4xl mb-8">
                    🍓
                </div>

                <h3 class="text-2xl font-bold text-[#5b2d2d] mb-4">
                    Fresh Ingredients
                </h3>

                <p class="text-gray-500 leading-relaxed">
                    Semua cake dibuat fresh setiap hari
                    dengan bahan pilihan terbaik.
                </p>

            </div>

            <!-- card -->
            <div class="bg-white rounded-[40px] p-10 shadow-lg hover:-translate-y-3 transition duration-300">

                <div class="w-20 h-20 rounded-full bg-pink-100 flex items-center justify-center text-4xl mb-8">
                    ❤️
                </div>

                <h3 class="text-2xl font-bold text-[#5b2d2d] mb-4">
                    Handmade
                </h3>

                <p class="text-gray-500 leading-relaxed">
                    Setiap cake dibuat dengan penuh cinta
                    dan detail yang cantik.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- TEAM -->
<section class="py-24 bg-[#fff4f6]">

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">

        <!-- heading -->
        <div class="text-center mb-20">

            <span class="bg-pink-100 text-pink-500 px-5 py-2 rounded-full font-medium inline-block mb-6">
                👩‍🍳 Our Team
            </span>

            <h2 class="text-5xl font-bold text-[#5b2d2d] mb-6">
                Meet Our Sweet Team
            </h2>

        </div>

        <!-- grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- member -->
            <div class="bg-white rounded-[40px] overflow-hidden shadow-lg hover:-translate-y-3 transition duration-300">

                <img
                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1200&auto=format&fit=crop"
                    class="w-full h-[420px] object-cover">

                <div class="p-8 text-center">

                    <h3 class="text-3xl font-bold text-[#5b2d2d] mb-2">
                        Sarah
                    </h3>

                    <p class="text-pink-500 font-medium">
                        Founder & Baker
                    </p>

                </div>

            </div>

            <!-- member -->
            <div class="bg-white rounded-[40px] overflow-hidden shadow-lg hover:-translate-y-3 transition duration-300">

                <img
                    src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200&auto=format&fit=crop"
                    class="w-full h-[420px] object-cover">

                <div class="p-8 text-center">

                    <h3 class="text-3xl font-bold text-[#5b2d2d] mb-2">
                        Michael
                    </h3>

                    <p class="text-pink-500 font-medium">
                        Pastry Chef
                    </p>

                </div>

            </div>

            <!-- member -->
            <div class="bg-white rounded-[40px] overflow-hidden shadow-lg hover:-translate-y-3 transition duration-300">

                <img
                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1200&auto=format&fit=crop"
                    class="w-full h-[420px] object-cover">

                <div class="p-8 text-center">

                    <h3 class="text-3xl font-bold text-[#5b2d2d] mb-2">
                        Olivia
                    </h3>

                    <p class="text-pink-500 font-medium">
                        Cake Decorator
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="py-24">

    <div class="max-w-[1200px] mx-auto px-8">

        <div class="bg-gradient-to-r from-pink-500 to-[#a44c63] rounded-[60px] p-16 text-center text-white relative overflow-hidden">

            <!-- blur -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">

                <h2 class="text-5xl font-bold mb-6">
                    Order Your Sweet Cake Today
                </h2>

                <p class="text-pink-100 text-xl mb-10 max-w-2xl mx-auto">
                    Rayakan momen spesial Anda bersama cake premium
                    dari Toko Kue dengan rasa terbaik dan tampilan cantik.
                </p>

                <a href="{{ route('cakes') }}"
                    class="bg-white text-pink-500 px-10 py-5 rounded-full inline-block font-bold text-lg shadow-lg hover:scale-105 transition">

                    🍰 Explore Cakes

                </a>

            </div>

        </div>

    </div>

</section>

@endsection