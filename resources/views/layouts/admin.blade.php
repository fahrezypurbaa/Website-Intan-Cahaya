<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Intan Safety Jogja</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white text-gray-800 flex flex-col shadow-md">
            <!-- Logo + Brand -->
            <div class="p-6 border-b border-gray-200 flex flex-col items-center">
                <img src="/images/logo.png" alt="Logo" class="w-14 h-14 mb-3 rounded-full object-cover">
                <span class="text-lg font-bold text-[#144F5F]">Intan Safety Jogja</span>
                <span class="text-sm text-gray-500">PT Intan Cahaya Mandiri</span>
            </div>


            <!-- Nav -->
            <nav class="flex-1 p-4 space-y-2 text-sm font-medium">
                @php
                    $links = [
                        ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
                        ['name' => 'Hubungi Kami', 'route' => 'admin.contacts.index'],
                        ['name' => 'Gallery', 'route' => 'admin.galleries.index'],
                        ['name' => 'Registrasi', 'route' => 'admin.registrations.index'],
                        ['name' => 'Pelatihan', 'route' => 'admin.trainings.index'],
                        ['name' => 'Materi', 'route' => 'admin.materials.index'],
                        ['name' => 'Artikel', 'route' => 'admin.articles.index'],
                    ];
                @endphp

                @foreach ($links as $link)
                    <a href="{{ route($link['route']) }}"
                        class="relative flex items-center justify-between px-4 py-2 rounded-lg transition-all duration-300 ease-in-out
                              {{ request()->routeIs($link['route']) || request()->is(str_replace('.', '/', $link['route']) . '*')
                                  ? 'bg-gradient-to-r from-[#144F5F]/10 to-[#73BA7D]/10 text-[#144F5F] font-semibold pl-5'
                                  : 'hover:bg-gradient-to-r hover:from-[#144F5F]/5 hover:to-[#73BA7D]/5 hover:text-[#144F5F]' }}">
                        <span>{{ $link['name'] }}</span>

                        <!-- Accent border (animated) -->
                        <span
                            class="absolute left-0 top-0 h-full w-1 rounded-r bg-gradient-to-b from-[#144F5F] to-[#73BA7D]
                                     transform scale-y-0 transition-transform duration-300 ease-in-out
                                     {{ request()->routeIs($link['route']) || request()->is(str_replace('.', '/', $link['route']) . '*') ? 'scale-y-100' : 'group-hover:scale-y-100' }}">
                        </span>
                    </a>
                @endforeach
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-gray-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg font-semibold transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="relative bg-white shadow p-4 flex justify-between items-center overflow-hidden">
                <!-- Gradient overlay tipis -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/15 to-[#73BA7D]/15 pointer-events-none">
                </div>

                <!-- Konten Navbar -->
                <h1 class="relative text-xl font-semibold text-[#144F5F]">@yield('title')</h1>
                <div class="relative flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <img class="w-10 h-10 rounded-full border-2 border-[#73BA7D]"
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Avatar">
                </div>
            </header>

            <!-- Page Content -->
            <section class="p-6 flex-1 overflow-y-auto bg-gray-50">
                @yield('content')
            </section>
        </main>
    </div>
</body>

</html>
