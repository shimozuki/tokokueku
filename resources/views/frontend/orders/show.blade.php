@extends('frontend.layouts.app')

@section('content')

<section class="py-20 bg-[#f8f3f1] min-h-screen">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-10 items-start">

            {{-- IMAGE --}}
            <div class="relative">

                <div class="bg-gradient-to-br from-[#ffdde5] to-[#fff1f4] rounded-[40px] p-10 shadow-2xl">

                    <img
                        src="{{ asset('storage/' . $order->product_image) }}"
                        alt="{{ $order->product_name }}"
                        class="w-full h-[500px] object-cover rounded-[30px] shadow-xl">

                </div>

                {{-- STATUS BADGE --}}
                <div class="absolute top-8 left-8 bg-[#d94f70] text-white px-6 py-3 rounded-full shadow-lg">

                    {{ ucfirst($order->order_status) }}

                </div>

            </div>

            {{-- DETAIL --}}
            <div class="bg-white rounded-[40px] shadow-2xl p-10 border border-[#f3e6e1]">

                {{-- HEADER --}}
                <div class="mb-8">

                    <h1 class="text-5xl font-bold text-[#5c2c22] mb-3">

                        Detail Pesanan

                    </h1>

                    <p class="text-gray-500 text-lg">

                        Informasi lengkap pesanan cake kamu 😄

                    </p>

                </div>

                {{-- PRODUCT --}}
                <div class="mb-8 pb-8 border-b border-gray-100">

                    <h2 class="text-3xl font-bold text-[#d94f70] mb-2">

                        {{ $order->product_name }}

                    </h2>

                    <p class="text-gray-500 leading-relaxed">

                        {{ $order->product_description }}

                    </p>

                </div>

                {{-- INFORMATION --}}
                <div class="space-y-6">

                    <div class="flex justify-between items-center">

                        <span class="text-gray-500 font-medium">
                            Invoice
                        </span>

                        <span class="font-bold text-[#5c2c22]">
                            {{ $order->invoice_number }}
                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-gray-500 font-medium">
                            Customer
                        </span>

                        <span class="font-semibold text-[#5c2c22]">
                            {{ $order->customer_name }}
                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-gray-500 font-medium">
                            Total Harga
                        </span>

                        <span class="text-3xl font-bold text-[#d94f70]">

                            Rp {{ number_format($order->total_price,0,',','.') }}

                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-gray-500 font-medium">
                            Status Pembayaran
                        </span>

                        @if($order->payment_status == 'belum_bayar')

                        <span class="bg-red-100 text-red-600 px-5 py-2 rounded-full text-sm font-semibold">

                            Belum Bayar

                        </span>

                        @else

                        <span class="bg-green-100 text-green-600 px-5 py-2 rounded-full text-sm font-semibold">

                            Sudah Bayar

                        </span>

                        @endif

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-gray-500 font-medium">
                            Metode Pembayaran
                        </span>

                        <span class="font-semibold text-[#5c2c22] uppercase">

                            {{ $order->payment_method }}

                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-gray-500 font-medium">
                            Tanggal Pesanan
                        </span>

                        <span class="font-semibold text-[#5c2c22]">

                            {{ $order->created_at->format('d M Y H:i') }}

                        </span>

                    </div>

                </div>

                {{-- NOTES --}}
                <div class="mt-10">

                    <h3 class="text-xl font-bold text-[#5c2c22] mb-4">

                        Catatan Pesanan

                    </h3>

                    <div class="bg-[#fff7f5] rounded-2xl p-5 text-gray-600 leading-relaxed">

                        {{ $order->notes ?? 'Tidak ada catatan tambahan 😄' }}

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="flex gap-4 mt-10">

                    <a
                        href="{{ route('my.orders') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-full font-semibold transition duration-300">
                        Kembali
                    </a>

                    <a
                        href="#"
                        class="bg-[#d94f70] hover:bg-[#b93c5a] text-white px-8 py-4 rounded-full font-semibold transition duration-300 shadow-lg">
                        Hubungi Admin
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection