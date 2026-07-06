<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TokoKueKu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#17284A] min-h-screen flex items-center justify-center">

    <div>

        <div class="text-center mb-8">

            <h1 class="text-5xl font-bold text-pink-500">
                🍰 TokoKueKu
            </h1>

            <p class="text-gray-300 mt-2">
                Daftar sebagai pelanggan
            </p>

        </div>

        {{ $slot }}

    </div>

</body>

</html>