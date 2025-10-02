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
        <aside class="w-64 bg-white/90 backdrop-blur-md text-gray-800 flex flex-col shadow-lg border-r border-gray-200">
            <!-- Logo + Brand -->
            <div class="p-6 border-b border-gray-200 flex flex-col items-center">
                <img src="/images/logo.png" alt="Logo" class="w-14 h-14 mb-3 rounded-full object-cover shadow-md">
                <span class="text-lg font-bold text-[#144F5F]">Intan Safety Jogja</span>
                <span class="text-sm text-gray-500">PT Intan Cahaya Mandiri</span>
            </div>

            <!-- Nav -->
            <nav class="flex-1 p-4 space-y-2 text-sm font-medium">
                @php
                    $links = [
                        ['name' => 'Dashboard', 'icon' => '📊', 'route' => 'admin.dashboard'],
                        ['name' => 'Hubungi Kami', 'icon' => '✉️', 'route' => 'admin.contacts.index'],
                        ['name' => 'Gallery', 'icon' => '🖼️', 'route' => 'admin.galleries.index'],
                        ['name' => 'Registrasi', 'icon' => '📝', 'route' => 'admin.registrations.index'],
                        ['name' => 'Pelatihan', 'icon' => '📚', 'route' => 'admin.trainings.index'],
                        ['name' => 'Materi', 'icon' => '📂', 'route' => 'admin.materials.index'],
                        ['name' => 'Rundown', 'icon' => '📅', 'route' => 'admin.rundowns.index'],
                        ['name' => 'Artikel', 'icon' => '📰', 'route' => 'admin.articles.index'],
                    ];
                @endphp

                @foreach ($links as $link)
                    <a href="{{ route($link['route']) }}"
                        class="relative flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-300 ease-in-out
                              {{ request()->routeIs($link['route']) || request()->is(str_replace('.', '/', $link['route']) . '*')
                                  ? 'bg-gradient-to-r from-[#144F5F]/10 to-[#73BA7D]/10 text-[#144F5F] font-semibold pl-5 shadow-sm'
                                  : 'hover:bg-gradient-to-r hover:from-[#144F5F]/5 hover:to-[#73BA7D]/5 hover:text-[#144F5F]' }}">
                        <span>{{ $link['icon'] }}</span>
                        <span>{{ $link['name'] }}</span>
                    </a>
                @endforeach
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-gray-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white py-2 rounded-lg font-semibold transition shadow-md">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="relative bg-white/95 backdrop-blur-md shadow-md p-4 flex justify-between items-center z-10">
                <h1 class="relative text-xl font-bold text-[#144F5F]">@yield('title')</h1>
                <div class="relative flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                    <img class="w-10 h-10 rounded-full border-2 border-[#73BA7D] shadow-sm"
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
