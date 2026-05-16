@extends('frontend.layouts.app')

@section('content')

<!-- DETAIL PRODUCT -->
<section class="relative overflow-hidden py-16">

    <!-- blur decoration -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-pink-100 rounded-full blur-3xl opacity-40"></div>

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16 relative z-10">

        <!-- breadcrumb -->
        <div class="flex items-center gap-3 text-gray-400 mb-10">

            <a href="/" class="hover:text-pink-500 transition">
                Home
            </a>

            <span>/</span>

            <a href="#products" class="hover:text-pink-500 transition">
                Cakes
            </a>

            <span>/</span>

            <span class="text-[#5b2d2d] font-medium">
                {{ $product->name }}
            </span>

        </div>

        <!-- content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">

            <!-- LEFT IMAGE -->
            <div class="relative">

                <!-- background -->
                <div class="absolute inset-0 bg-gradient-to-br from-pink-200 to-[#ddb3bb] rounded-[60px] rotate-3"></div>

                <!-- image box -->
                <div class="relative bg-white rounded-[60px] p-8 shadow-2xl">

                    <!-- favorite -->
                    <button class="absolute top-8 right-8 w-14 h-14 rounded-full bg-pink-100 hover:bg-pink-500 hover:text-white transition flex items-center justify-center text-2xl shadow">
                        ❤️
                    </button>

                    <!-- image -->
                    <div class="overflow-hidden rounded-[40px]">

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            class="w-full h-[600px] object-cover hover:scale-105 transition duration-700">

                    </div>

                </div>

            </div>

            <!-- RIGHT CONTENT -->
            <div>

                <!-- category -->
                <div class="mb-6">

                    <span class="bg-pink-100 text-pink-500 px-5 py-2 rounded-full font-medium">
                        🍰 {{ $product->category->name ?? 'Cake' }}
                    </span>

                </div>

                <!-- title -->
                <h1 class="text-5xl lg:text-6xl font-extrabold text-[#5b2d2d] leading-tight mb-6">
                    {{ $product->name }}
                </h1>

                <!-- rating -->
                <div class="flex items-center gap-5 mb-8">

                    <div class="flex items-center gap-2 text-yellow-400 text-2xl">
                        ⭐ ⭐ ⭐ ⭐ ⭐
                    </div>

                    <div class="text-gray-500">
                        (4.9 Reviews)
                    </div>

                </div>

                <!-- price -->
                <div class="mb-10">

                    <div class="text-5xl font-bold text-pink-500">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>

                </div>

                <!-- description -->
                <div class="bg-white rounded-[30px] p-8 shadow-sm mb-10">

                    <h3 class="text-2xl font-bold text-[#5b2d2d] mb-5">
                        Description
                    </h3>

                    <p class="text-gray-500 leading-relaxed text-lg">
                        {{ $product->description }}
                    </p>

                </div>

                <!-- info -->
                <div class="grid grid-cols-2 gap-5 mb-10">

                    <div class="bg-pink-50 rounded-[25px] p-6">

                        <div class="text-pink-500 text-3xl mb-3">
                            📦
                        </div>

                        <div class="text-gray-500 text-sm mb-1">
                            Stock
                        </div>

                        <div class="font-bold text-[#5b2d2d] text-xl">
                            {{ $product->stock }}
                        </div>

                    </div>

                    <div class="bg-pink-50 rounded-[25px] p-6">

                        <div class="text-pink-500 text-3xl mb-3">
                            🚚
                        </div>

                        <div class="text-gray-500 text-sm mb-1">
                            Delivery
                        </div>

                        <div class="font-bold text-[#5b2d2d] text-xl">
                            Fast Delivery
                        </div>

                    </div>

                </div>

                <!-- quantity -->
                <div class="flex items-center gap-5 mb-10">

                    <div class="flex items-center bg-white rounded-full shadow overflow-hidden">

                        <button class="w-14 h-14 text-2xl hover:bg-pink-50 transition">
                            -
                        </button>

                        <div class="w-14 text-center font-bold">
                            1
                        </div>

                        <button class="w-14 h-14 text-2xl hover:bg-pink-50 transition">
                            +
                        </button>

                    </div>

                    <div class="text-gray-500">
                        Quantity
                    </div>

                </div>

                <!-- button -->
                <div class="flex gap-5 mt-8">

                    <!-- order -->
                    <button
                        class="bg-gradient-to-r from-pink-500 to-[#a44c63] text-white px-10 py-5 rounded-full shadow-lg hover:shadow-2xl hover:-translate-y-1 transition font-semibold text-lg">

                        🎂 Pesan Sekarang

                    </button>

                    <!-- consultation -->
                    <a href="https://wa.me/628123456789"
                        target="_blank"
                        class="bg-white border border-pink-200 hover:border-pink-400 px-10 py-5 rounded-full shadow-md hover:shadow-xl transition font-semibold text-[#7b2c3b] text-lg">

                        💬 Konsultasi

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- RELATED PRODUCT -->
<section class="py-20">

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">

        <!-- title -->
        <div class="flex items-center justify-between mb-14">

            <div>

                <span class="bg-pink-100 text-pink-500 px-5 py-2 rounded-full font-medium inline-block mb-5">
                    🍰 You May Also Like
                </span>

                <h2 class="text-4xl font-bold text-[#5b2d2d]">
                    Related Cakes
                </h2>

            </div>

        </div>

        <!-- grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($relatedProducts as $item)

            <div class="group relative">

                <!-- bg -->
                <div class="absolute inset-0 bg-gradient-to-b from-pink-100 to-pink-200 rounded-[40px] rotate-1 group-hover:rotate-2 transition"></div>

                <!-- card -->
                <div class="relative bg-white rounded-[40px] overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-3 transition duration-300">

                    <!-- image -->
                    <div class="p-6 bg-[#fff4f6]">

                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            class="w-full h-56 object-cover rounded-[30px] group-hover:scale-105 transition duration-500">

                    </div>

                    <!-- content -->
                    <div class="p-6">

                        <h3 class="text-2xl font-bold text-[#5b2d2d] mb-3">
                            {{ $item->name }}
                        </h3>

                        <div class="text-pink-500 font-bold text-2xl mb-5">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </div>

                        <a
                            href="{{ route('products.show', $item->slug) }}"
                            class="bg-gradient-to-r from-pink-500 to-[#a44c63] text-white px-6 py-3 rounded-full inline-block hover:scale-105 transition">

                            Detail

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection