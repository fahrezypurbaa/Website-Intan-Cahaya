@extends('layouts.app')

@section('content')
    {{-- Banner Kontak Kami --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" 
             alt="Kontak Kami" 
             class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white">KONTAK KAMI</h1>
        </div>
    </div>
    
    <div class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-8">
            Contact Information <br>
            <span class="text-[#73BA7D] text-lg font-medium">Let Your Wanderlust Guide You</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Informasi Kontak --}}
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <ul class="space-y-5">
                    <li class="flex items-center">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 mr-3">
                            ⏰
                        </span>
                        <span class="text-gray-900">Senin - Jumat (08.00 - 16.30)</span>
                    </li>
                    <li class="flex items-center">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 mr-3">
                            📞
                        </span>
                        <span class="text-gray-900">0274-4297535</span>
                    </li>
                    <li class="flex items-center">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 mr-3">
                            📧
                        </span>
                        <span class="text-gray-900">admin@intancahayamandiri.com</span>
                    </li>
                    <li class="flex items-center">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 mr-3">
                            📍
                        </span>
                        <span class="text-gray-900">
                            Jl. Panggung Asri No.37, Trihanggo, Gamping, <br>
                            Sleman, Yogyakarta 55291
                        </span>
                    </li>
                </ul>
            </div>

            {{-- Formulir --}}
            <div class="bg-green-50 p-6 rounded-2xl shadow-md">
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium">Nama</label>
                        <input type="text" name="nama" class="w-full p-3 border rounded-lg" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" class="w-full p-3 border rounded-lg" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Telepon</label>
                        <input type="text" name="telepon" class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Pesan</label>
                        <textarea name="pesan" rows="4" class="w-full p-3 border rounded-lg" required></textarea>
                    </div>
                    <button type="submit" class="w-full py-3 bg-[#73BA7D] text-white rounded-lg hover:bg-green-700 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
