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
        <aside class="w-64 bg-blue-900 text-white flex flex-col">
            <div class="p-4 text-2xl font-bold border-b border-blue-700">
                Admin Panel
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.trainings.index') }}" class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('admin/trainings*') ? 'bg-blue-700' : '' }}">
                    Training
                </a>
                <a href="{{ route('admin.participants.index') }}" class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('admin/participants*') ? 'bg-blue-700' : '' }}">
                    Participant
                </a>
            </nav>
            <div class="p-4 border-t border-blue-700">
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
                    <img class="w-10 h-10 rounded-full border" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Avatar">
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
