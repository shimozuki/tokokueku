@extends('frontend.layouts.app')

@section('content')

<!-- HERO -->
<section class="relative overflow-hidden bg-[#fff8f6]">

    <!-- blur decoration -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-pink-200/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ddb3bb]/30 rounded-full blur-3xl"></div>

    <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[85vh]">

        <!-- LEFT CONTENT -->
        <div class="flex items-center relative z-10">

            <div class="max-w-2xl mx-auto px-8 lg:px-16 py-20">

                <!-- badge -->
                <div class="mb-8">

                    <span class="bg-pink-100 text-pink-500 px-6 py-3 rounded-full font-semibold shadow-sm">
                        🍰 Fresh Cake Everyday
                    </span>

                </div>

                <!-- title -->
                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight text-[#5b2d2d] mb-8">

                    Sweet Cake
                    For Your

                    <span class="text-pink-500 block">
                        Special Moment
                    </span>

                </h1>

                <!-- desc -->
                <p class="text-gray-500 text-xl leading-relaxed mb-10 max-w-xl">
                    Nikmati berbagai pilihan kue premium dengan desain cantik,
                    rasa lembut, dan dibuat fresh setiap hari untuk momen spesial Anda.
                </p>

                <!-- button -->
                <div class="flex flex-wrap gap-5 mb-16">

                    <a href="#products"
                        class="bg-gradient-to-r from-pink-500 to-[#a44c63] hover:scale-105 transition duration-300 text-white px-10 py-4 rounded-full shadow-xl font-semibold">

                        Shop Now

                    </a>

                    <button
                        class="bg-white border border-pink-200 hover:border-pink-400 hover:scale-105 transition duration-300 text-[#7b2c3b] px-10 py-4 rounded-full shadow-md font-semibold">

                        Customize Cake

                    </button>

                </div>

                <!-- mini info -->
                <div class="flex flex-wrap gap-10">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center text-2xl">
                            🎂
                        </div>

                        <div>
                            <div class="font-bold text-[#5b2d2d]">
                                100+
                            </div>

                            <div class="text-gray-500 text-sm">
                                Cake Variant
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center text-2xl">
                            😍
                        </div>

                        <div>
                            <div class="font-bold text-[#5b2d2d]">
                                1000+
                            </div>

                            <div class="text-gray-500 text-sm">
                                Happy Customer
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center text-2xl">
                            ⭐
                        </div>

                        <div>
                            <div class="font-bold text-[#5b2d2d]">
                                4.9
                            </div>

                            <div class="text-gray-500 text-sm">
                                Rating
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="relative flex items-center justify-center overflow-hidden bg-gradient-to-br from-[#e7bcc5] to-[#dba6b1] rounded-bl-[180px]">

            <!-- floating elements -->
            <div class="absolute top-24 left-20 text-6xl animate-bounce">
                🍓
            </div>

            <div class="absolute top-40 right-16 text-5xl animate-pulse">
                🧁
            </div>

            <div class="absolute bottom-24 left-20 text-5xl animate-bounce">
                🍫
            </div>

            <!-- big circle -->
            <div class="absolute w-[650px] h-[650px] bg-white/20 rounded-full"></div>

            <!-- image -->
            <div class="relative z-10 group">

                <div class="absolute -inset-3 bg-white/30 blur-2xl rounded-[50px]"></div>

                <img
                    src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1200&auto=format&fit=crop"
                    class="relative w-[360px] h-[470px] object-cover rounded-t-[220px] rounded-b-[40px] border-[10px] border-white shadow-2xl group-hover:scale-105 transition duration-500">

            </div>

            <!-- small decorations -->
            <div class="absolute bottom-16 right-10 w-40 h-40 bg-white/20 rounded-full"></div>

            <div class="absolute bottom-28 right-28 w-20 h-20 bg-[#a77d84]/40 rounded-full"></div>

        </div>

    </div>

</section>
<!-- CATALOG -->
<section id="products" class="relative py-10 overflow-hidden">

    <!-- blur decoration -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-pink-100 rounded-full blur-3xl opacity-40"></div>

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16 relative z-10">

        <!-- heading -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-16">

            <div>

                <span class="bg-pink-100 text-pink-500 px-5 py-2 rounded-full font-medium inline-block mb-5">
                    🍰 Our Delicious Cake
                </span>

                <h2 class="text-4xl lg:text-5xl font-bold text-[#5b2d2d] leading-tight mb-4">
                    Sweet Cake
                    Collection
                </h2>

                <p class="text-gray-500 text-lg max-w-2xl">
                    Temukan berbagai pilihan cake premium dengan desain cantik
                    dan rasa terbaik untuk setiap momen spesial Anda.
                </p>

            </div>

            <!-- button -->
            <div class="mt-8 lg:mt-0">

                <a href="{{ route('cakes') }}"
                    class="inline-block bg-white border border-pink-200 hover:border-pink-400 transition px-8 py-4 rounded-full shadow-sm font-medium text-[#7b2d2d]">

                    View All Cake

                </a>

            </div>

        </div>

        <!-- product grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($products->take(4) as $product)

            <!-- card -->
            <div class="group relative">

                <!-- shadow bg -->
                <div class="absolute inset-0 bg-gradient-to-b from-pink-100 to-pink-200 rounded-[40px] rotate-1 group-hover:rotate-2 transition duration-300"></div>

                <!-- card -->
                <div class="relative bg-white rounded-[40px] overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-3">

                    <!-- top -->
                    <div class="relative bg-[#fff4f6] p-6">

                        <!-- favorite -->
                        <button class="absolute top-5 right-5 w-10 h-10 rounded-full bg-white shadow flex items-center justify-center hover:scale-110 transition">
                            ❤️
                        </button>

                        <!-- category -->
                        <div class="mb-5">

                            <span class="bg-pink-100 text-pink-500 px-4 py-2 rounded-full text-sm font-medium">
                                {{ $product->category->name ?? 'Cake' }}
                            </span>

                        </div>

                        <!-- image -->
                        <div class="flex justify-center">

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                class="w-52 h-52 object-cover rounded-full border-8 border-white shadow-lg group-hover:scale-105 transition duration-500">

                        </div>

                    </div>

                    <!-- bottom -->
                    <div class="p-6">

                        <!-- title -->
                        <h3 class="text-2xl font-bold text-[#5b2d2d] mb-3 line-clamp-1">
                            {{ $product->name }}
                        </h3>

                        <!-- description -->
                        <p class="text-gray-500 text-sm leading-relaxed mb-5 line-clamp-2">
                            {{ $product->description }}
                        </p>

                        <!-- footer -->
                        <div class="flex items-center justify-between">

                            <!-- price -->
                            <div>

                                <div class="text-pink-500 font-bold text-2xl">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>

                                <div class="text-yellow-400 text-sm">
                                    ⭐ 4.9 Rating
                                </div>

                            </div>

                            <!-- detail -->
                            <a
                                href="{{ route('products.show', $product->slug) }}"
                                class="w-14 h-14 rounded-full bg-gradient-to-r from-pink-500 to-[#a44c63] text-white flex items-center justify-center shadow-lg hover:scale-110 transition">

                                →
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection