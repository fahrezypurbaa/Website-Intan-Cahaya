<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Intan Safety')</title>
    {{-- Fav Icon --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- Tambahkan Swiper.js untuk slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body class="bg-white text-gray-800">

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')
    {{-- Floating WhatsApp Button --}}
    <button onclick="document.getElementById('waPopup').classList.remove('hidden')"
        class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg px-4 py-3 flex items-center gap-2 z-50">

        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-6 h-6" alt="WA">
        <span class="font-semibold">Hubungi Kami</span>
    </button>

    {{-- Popup Pilih Admin --}}
    <div id="waPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div
            class="bg-white rounded-2xl shadow-2xl w-80 p-6 relative transform transition-all scale-95 hover:scale-100">

            {{-- Tombol Close --}}
            <button onclick="document.getElementById('waPopup').classList.add('hidden')"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                ✖
            </button>

            <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Hubungi Admin</h2>
            <p class="text-gray-500 text-sm text-center mb-6">Pilih admin yang ingin Anda hubungi via WhatsApp</p>

            <div class="space-y-4">
                {{-- Admin A --}}
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20A,%20saya%20butuh%20informasi" target="_blank"
                    class="flex items-center gap-3 p-3 rounded-lg border hover:bg-green-50 transition">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-7 h-7"
                        alt="WA">
                    <div>
                        <p class="font-medium text-gray-800">Admin A</p>
                        <p class="text-xs text-gray-500">Respon cepat & ramah</p>
                    </div>
                </a>

                {{-- Admin B --}}
                <a href="https://wa.me/6289876543210?text=Halo%20Admin%20B,%20saya%20butuh%20informasi" target="_blank"
                    class="flex items-center gap-3 p-3 rounded-lg border hover:bg-green-50 transition">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-7 h-7"
                        alt="WA">
                    <div>
                        <p class="font-medium text-gray-800">Admin B</p>
                        <p class="text-xs text-gray-500">Siap membantu kebutuhan Anda</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>

</html>