@extends('frontend.layouts.app')

@section('content')

<!-- HERO -->
<section class="relative overflow-hidden py-24 bg-[#fff8f6]">

    <!-- blur -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-pink-200/30 rounded-full blur-3xl"></div>

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16 relative z-10">

        <div class="text-center mb-20">

            <span class="bg-pink-100 text-pink-500 px-5 py-2 rounded-full font-medium inline-block mb-8">
                📞 Contact Us
            </span>

            <h1 class="text-5xl lg:text-7xl font-extrabold text-[#5b2d2d] leading-tight mb-8">
                Let's Talk Sweet
            </h1>

            <p class="text-gray-500 text-xl max-w-3xl mx-auto leading-relaxed">
                Hubungi kami untuk pemesanan cake custom,
                pertanyaan produk, atau informasi lainnya.
                Kami siap membantu membuat momen spesial Anda lebih manis.
            </p>

        </div>

    </div>

</section>

<!-- CONTACT -->
<section class="pb-24">

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14">

            <!-- LEFT -->
            <div>

                <!-- info card -->
                <div class="bg-white rounded-[50px] p-10 shadow-xl mb-10">

                    <h2 class="text-4xl font-bold text-[#5b2d2d] mb-10">
                        Contact Information
                    </h2>

                    <!-- item -->
                    <div class="space-y-8">

                        <!-- address -->
                        <div class="flex items-start gap-6">

                            <div class="w-16 h-16 rounded-full bg-pink-100 flex items-center justify-center text-3xl shrink-0">
                                📍
                            </div>

                            <div>

                                <h3 class="text-2xl font-bold text-[#5b2d2d] mb-2">
                                    Address
                                </h3>

                                <p class="text-gray-500 leading-relaxed">
                                    Jl. Bungkarno Lintas Sernu Kerato <br>
                                    West Nusa Tenggara, Indonesia
                                </p>

                            </div>

                        </div>

                        <!-- phone -->
                        <div class="flex items-start gap-6">

                            <div class="w-16 h-16 rounded-full bg-pink-100 flex items-center justify-center text-3xl shrink-0">
                                📞
                            </div>

                            <div>

                                <h3 class="text-2xl font-bold text-[#5b2d2d] mb-2">
                                    Phone
                                </h3>

                                <p class="text-gray-500">
                                    +62 812 3456 7890
                                </p>

                            </div>

                        </div>

                        <!-- email -->
                        <div class="flex items-start gap-6">

                            <div class="w-16 h-16 rounded-full bg-pink-100 flex items-center justify-center text-3xl shrink-0">
                                ✉️
                            </div>

                            <div>

                                <h3 class="text-2xl font-bold text-[#5b2d2d] mb-2">
                                    Email
                                </h3>

                                <p class="text-gray-500">
                                    tokokue@example.com
                                </p>

                            </div>

                        </div>

                        <!-- hours -->
                        <div class="flex items-start gap-6">

                            <div class="w-16 h-16 rounded-full bg-pink-100 flex items-center justify-center text-3xl shrink-0">
                                ⏰
                            </div>

                            <div>

                                <h3 class="text-2xl font-bold text-[#5b2d2d] mb-2">
                                    Open Hours
                                </h3>

                                <p class="text-gray-500">
                                    Monday - Sunday <br>
                                    08:00 AM - 09:00 PM
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- social -->
                <div class="bg-gradient-to-r from-pink-500 to-[#a44c63] rounded-[50px] p-10 text-white shadow-xl">

                    <h2 class="text-3xl font-bold mb-8">
                        Follow Us
                    </h2>

                    <div class="flex items-center gap-5">

                        <a href="#"
                            class="w-16 h-16 rounded-full bg-white/20 hover:bg-white hover:text-pink-500 transition flex items-center justify-center text-3xl">

                            📷

                        </a>

                        <a href="#"
                            class="w-16 h-16 rounded-full bg-white/20 hover:bg-white hover:text-pink-500 transition flex items-center justify-center text-3xl">

                            🎵

                        </a>

                        <a href="#"
                            class="w-16 h-16 rounded-full bg-white/20 hover:bg-white hover:text-pink-500 transition flex items-center justify-center text-3xl">

                            📘

                        </a>

                        <a href="#"
                            class="w-16 h-16 rounded-full bg-white/20 hover:bg-white hover:text-pink-500 transition flex items-center justify-center text-3xl">

                            💬

                        </a>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="bg-white rounded-[50px] p-10 shadow-xl">

                <h2 class="text-4xl font-bold text-[#5b2d2d] mb-10">
                    Send Message
                </h2>

                <form class="space-y-8">

                    <!-- name -->
                    <div>

                        <label class="block text-[#5b2d2d] font-semibold mb-3">
                            Full Name
                        </label>

                        <input
                            type="text"
                            placeholder="Enter your name"
                            class="w-full h-16 rounded-2xl border border-pink-100 px-6 focus:outline-none focus:border-pink-400 transition">

                    </div>

                    <!-- email -->
                    <div>

                        <label class="block text-[#5b2d2d] font-semibold mb-3">
                            Email Address
                        </label>

                        <input
                            type="email"
                            placeholder="Enter your email"
                            class="w-full h-16 rounded-2xl border border-pink-100 px-6 focus:outline-none focus:border-pink-400 transition">

                    </div>

                    <!-- subject -->
                    <div>

                        <label class="block text-[#5b2d2d] font-semibold mb-3">
                            Subject
                        </label>

                        <input
                            type="text"
                            placeholder="Enter subject"
                            class="w-full h-16 rounded-2xl border border-pink-100 px-6 focus:outline-none focus:border-pink-400 transition">

                    </div>

                    <!-- message -->
                    <div>

                        <label class="block text-[#5b2d2d] font-semibold mb-3">
                            Message
                        </label>

                        <textarea
                            rows="6"
                            placeholder="Write your message..."
                            class="w-full rounded-2xl border border-pink-100 p-6 focus:outline-none focus:border-pink-400 transition"></textarea>

                    </div>

                    <!-- button -->
                    <button
                        class="w-full bg-gradient-to-r from-pink-500 to-[#a44c63] hover:scale-[1.02] transition duration-300 text-white h-16 rounded-2xl font-bold text-lg shadow-xl">

                        Send Message ✨

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

<!-- MAP -->
<section class="pb-24">

    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">

        <div class="bg-white rounded-[50px] overflow-hidden shadow-xl">

            <div class="p-10">

                <h2 class="text-4xl font-bold text-[#5b2d2d] mb-4">
                    Our Location
                </h2>

                <p class="text-gray-500 text-lg">
                    Kunjungi toko kami dan nikmati cake fresh setiap hari.
                </p>

            </div>

            <!-- maps -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.1574026560716!2d117.40346029999999!3d-8.484071899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcbedfe360cb309%3A0x156c5be0035d733c!2sRofa%20Cake&#39;s!5e0!3m2!1sid!2sid!4v1779527452987!5m2!1sid!2sid"
                width="100%"
                height="500"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

    </div>

</section>

@endsection