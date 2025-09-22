<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Intan Cahaya</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#144F5F] text-white flex flex-col">
            <div class="p-4 text-2xl font-bold border-b border-[#73BA7D]">
                Admin Panel
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-2 rounded hover:bg-[#73BA7D] {{ request()->routeIs('admin.dashboard') ? 'bg-[#73BA7D]' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.contacts.index') }}"
                    class="block px-4 py-2 rounded hover:bg-[#73BA7D] {{ request()->routeIs('admin.contacts') ? 'bg-[#73BA7D]' : '' }}">
                    Hubungi Kami
                </a>
                <a href="{{ route('admin.galleries.index') }}"
                    class="block px-4 py-2 rounded hover:bg-[#73BA7D] {{ request()->is('admin/galleries*') ? 'bg-[#73BA7D]' : '' }}">
                    Gallery
                </a>
                <a href="{{ route('admin.registrations.index') }}"
                    class="block px-4 py-2 rounded hover:bg-[#73BA7D] {{ request()->is('admin/registrations*') ? 'bg-[#73BA7D]' : '' }}">
                    Registrations
                </a>
                <a href="{{ route('admin.trainings.index') }}"
                    class="block px-4 py-2 rounded hover:bg-[#73BA7D] {{ request()->is('admin/trainings*') ? 'bg-[#73BA7D]' : '' }}">
                    Pelatihan
                </a>

            </nav>
            <div class="p-4 border-t border-[#73BA7D]">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded">Logout</button>
                </form>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold">@yield('title')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <img class="w-10 h-10 rounded-full border"
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Avatar">
                </div>
            </header>

            <!-- Page Content -->
            <section class="p-6 flex-1 overflow-y-auto">
                @yield('content')
            </section>
        </main>
    </div>
</body>

</html>
