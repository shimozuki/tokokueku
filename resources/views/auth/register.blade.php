<x-guest-layout>

    <div class="w-full max-w-[700px] bg-white rounded-3xl shadow-xl p-10">

        <div class="text-center mb-8">
            <h2 class="text-4xl font-bold text-gray-800">
                Daftar Akun
            </h2>

            <p class="text-gray-500 mt-2">
                Buat akun pelanggan TokoKueKu
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:outline-none"
                        required>

                    @error('name')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:outline-none"
                        required>

                    @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:outline-none"
                        required>

                    @error('password')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:outline-none"
                        required>
                </div>

            </div>

            <div class="mt-8">

                <button
                    type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3 rounded-xl transition">
                    Daftar
                </button>

                <div class="text-center mt-4">
                    <a
                        href="/admin/login"
                        class="text-gray-500 hover:text-pink-600">
                        Sudah punya akun? Login
                    </a>
                </div>

            </div>

        </form>

    </div>

</x-guest-layout>