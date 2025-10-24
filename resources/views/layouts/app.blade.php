<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Intan Safety')</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Vite Assets --}}
    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp
    <link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">
    <script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>


    {{-- CDN (kalau belum install via NPM) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Google Tag --}}
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-X60V7TX5N9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-X60V7TX5N9');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5G7B9PPH');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body class="bg-white text-gray-800">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5G7B9PPH" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Floating WhatsApp Button --}}
    <button aria-label="Buka WhatsApp" onclick="document.getElementById('waPopup').classList.remove('hidden')"
        class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg px-4 py-3 flex items-center gap-2 z-50">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-6 h-6" alt="WA">
        <span class="font-semibold">Hubungi Kami</span>
    </button>

    {{-- Popup Pilih Admin --}}
    <div id="waPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div
            class="bg-white rounded-2xl shadow-2xl w-80 p-6 relative transform transition-all duration-300 ease-in-out scale-95 hover:scale-100">
            {{-- Tombol Close --}}
            <button onclick="document.getElementById('waPopup').classList.add('hidden')"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                ✖
            </button>

            <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Hubungi Admin</h2>

            <div class="space-y-4">
                {{-- Admin A --}}
                <a href="https://wa.me/6282146134846?text=Halo%20Admin%20Intan%20Safety!%20Saya%20(isi%20namamu)%20dari%20(perusahaanmu)%20ingin%20menanyakan%20pelatihan%20(judul%20pelatihan%20yang%20kamu%20ingin%20tanyakan)."
                    target="_blank" class="flex items-center gap-3 p-3 rounded-lg border hover:bg-green-50 transition">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-7 h-7"
                        alt="WA">
                    <div>
                        <p class="font-medium text-gray-800">Admin</p>
                        <p class="text-xs text-gray-500">Respon cepat & ramah</p>
                    </div>
                </a>

            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</body>

</html>
