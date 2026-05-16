@extends('frontend.layouts.app')

@section('content')

<!-- HERO -->
<section class="py-20 bg-[#fff8f6]">

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">

        <div class="text-center">

            <span class="bg-pink-100 text-pink-500 px-5 py-2 rounded-full font-medium inline-block mb-6">
                🍰 Our Cakes
            </span>

            <h1 class="text-5xl lg:text-7xl font-extrabold text-[#5b2d2d] mb-6">
                Sweet Cake Collection
            </h1>

            <p class="text-gray-500 text-xl max-w-3xl mx-auto">
                Temukan berbagai pilihan cake premium dengan desain cantik
                dan rasa terbaik untuk setiap momen spesial Anda.
            </p>

        </div>

    </div>

</section>

<!-- PRODUCT -->
<section class="py-20">

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">

        <!-- top -->
        <div class="flex flex-col lg:flex-row gap-5 lg:items-center lg:justify-between mb-14">

            <!-- search -->
            <div class="relative w-full lg:w-[400px]">

                <input
                    type="text"
                    placeholder="Search cake..."
                    class="w-full h-16 rounded-full border border-pink-100 bg-white px-7 focus:outline-none focus:border-pink-400 shadow-sm">

                <div class="absolute top-1/2 -translate-y-1/2 right-6 text-gray-400">
                    🔍
                </div>

            </div>

            <!-- filter -->
            <div class="flex flex-wrap gap-4">

                <button class="bg-pink-500 text-white px-6 py-3 rounded-full">
                    All
                </button>

                <button class="bg-white border border-pink-100 px-6 py-3 rounded-full hover:border-pink-400 transition">
                    Birthday
                </button>

                <button class="bg-white border border-pink-100 px-6 py-3 rounded-full hover:border-pink-400 transition">
                    Wedding
                </button>

                <button class="bg-white border border-pink-100 px-6 py-3 rounded-full hover:border-pink-400 transition">
                    Dessert
                </button>

            </div>

        </div>

        <!-- grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($products as $product)

            <div class="group relative">

                <!-- bg -->
                <div class="absolute inset-0 bg-gradient-to-b from-pink-100 to-pink-200 rounded-[40px] rotate-1 group-hover:rotate-2 transition"></div>

                <!-- card -->
                <div class="relative bg-white rounded-[40px] overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition duration-300">

                    <!-- image -->
                    <div class="relative p-6 bg-[#fff4f6]">

                        <!-- wishlist -->
                        <button class="absolute top-5 right-5 w-10 h-10 rounded-full bg-white shadow flex items-center justify-center">
                            ❤️
                        </button>

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            class="w-full h-64 object-cover rounded-[30px] group-hover:scale-105 transition duration-500">

                    </div>

                    <!-- content -->
                    <div class="p-6">

                        <div class="mb-3">

                            <span class="bg-pink-100 text-pink-500 px-4 py-2 rounded-full text-sm">
                                {{ $product->category->name ?? 'Cake' }}
                            </span>

                        </div>

                        <h3 class="text-2xl font-bold text-[#5b2d2d] mb-3">
                            {{ $product->name }}
                        </h3>

                        <p class="text-gray-500 text-sm mb-5 line-clamp-2">
                            {{ $product->description }}
                        </p>

                        <div class="flex items-center justify-between">

                            <div>

                                <div class="text-pink-500 font-bold text-2xl">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>

                                <div class="text-yellow-400 text-sm">
                                    ⭐ 4.9 Rating
                                </div>

                            </div>

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