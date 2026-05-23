@extends('frontend.layouts.app')

@section('content')

<section class="py-20 bg-[#f8f3f1] min-h-screen">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="mb-10">

            <h1 class="text-5xl font-bold text-[#5c2c22] mb-3">
                Pesanan Saya
            </h1>

            <p class="text-gray-500 text-lg">
                Lihat semua riwayat pesanan cake favoritmu 😄
            </p>

        </div>

        {{-- Card --}}
        <div class="bg-white rounded-[30px] shadow-xl overflow-hidden border border-[#f1e7e3]">

            {{-- Table Header --}}
            <div class="grid grid-cols-6 bg-gradient-to-r from-[#6b2d2d] to-[#a63d50] text-white font-semibold">

                <div class="p-5">
                    Invoice
                </div>

                <div class="p-5">
                    Total
                </div>

                <div class="p-5">
                    Status Order
                </div>

                <div class="p-5">
                    Pembayaran
                </div>

                <div class="p-5">
                    Tanggal
                </div>

                <div class="p-5 text-center">
                    Aksi
                </div>

            </div>

            {{-- Orders --}}
            @forelse($orders as $order)

            <div class="grid grid-cols-6 items-center border-b border-gray-100 hover:bg-[#fff7f5] transition duration-300">

                {{-- Invoice --}}
                <div class="p-5">

                    <p class="font-semibold text-[#5c2c22]">
                        {{ $order->invoice_number }}
                    </p>

                </div>

                {{-- Total --}}
                <div class="p-5">

                    <p class="font-bold text-[#d94f70]">
                        Rp {{ number_format($order->total_price,0,',','.') }}
                    </p>

                </div>

                {{-- Status Order --}}
                <div class="p-5">

                    <span class="bg-blue-100 text-blue-700 text-sm px-4 py-2 rounded-full">

                        {{ ucfirst($order->order_status) }}

                    </span>

                </div>

                {{-- Status Pembayaran --}}
                <div class="p-5">

                    @if($order->payment_status == 'belum_bayar')

                    <span class="bg-red-100 text-red-600 text-sm px-4 py-2 rounded-full">

                        Belum Bayar

                    </span>

                    @else

                    <span class="bg-green-100 text-green-600 text-sm px-4 py-2 rounded-full">

                        Sudah Bayar

                    </span>

                    @endif

                </div>

                {{-- Tanggal --}}
                <div class="p-5 text-gray-500">

                    {{ $order->created_at->format('d M Y') }}

                </div>

                {{-- Detail --}}
                <div class="p-5 flex flex-wrap items-center justify-center gap-3">

                    {{-- DETAIL --}}
                    <a
                        href="{{ route('orders.show', $order->id) }}"
                        class="inline-flex items-center gap-2
        bg-white border border-pink-200
        hover:bg-pink-50
        text-[#d94f70]
        px-5 py-2.5 rounded-full
        transition duration-300 shadow-md">

                        👁️ Detail

                    </a>

                    {{-- DOWNLOAD INVOICE --}}
                    <a
                        href="{{ route('orders.invoice', $order->id) }}"
                        class="inline-flex items-center gap-2
        bg-gradient-to-r from-pink-500 to-[#a44c63]
        hover:scale-105 hover:shadow-xl
        text-white px-5 py-2.5
        rounded-full transition duration-300 shadow-md">

                        📄 Invoice

                    </a>

                </div>

            </div>

            @empty

            <div class="text-center py-20">

                <img
                    src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                    class="w-32 mx-auto mb-6 opacity-80">

                <h2 class="text-2xl font-bold text-[#5c2c22] mb-2">

                    Belum Ada Pesanan

                </h2>

                <p class="text-gray-500 mb-6">

                    Yuk pesan cake favoritmu sekarang 😄

                </p>

                <a
                    href="/cakes"
                    class="bg-[#d94f70] hover:bg-[#b93c5a] text-white px-8 py-4 rounded-full transition duration-300 shadow-lg">
                    Pesan Sekarang
                </a>

            </div>

            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-10 flex justify-center">

            {{ $orders->links() }}

        </div>

    </div>

</section>

@endsection