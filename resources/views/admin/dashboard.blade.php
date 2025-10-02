@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Admin Dashboard</h1>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Training -->
            <div
                class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="flex items-center space-x-4">
                    <div class="p-4 rounded-xl bg-gradient-to-br from-[#144F5F]/20 to-[#73BA7D]/20 text-[#144F5F] text-2xl">
                        📚
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $trainingsCount }}</h2>
                        <p class="text-gray-600">Total Training</p>
                    </div>
                </div>
            </div>

            <!-- Kategori -->
            <div
                class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="flex items-center space-x-4">
                    <div class="p-4 rounded-xl bg-gradient-to-br from-[#73BA7D]/20 to-[#144F5F]/20 text-[#73BA7D] text-2xl">
                        🗂️
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $categoriesCount }}</h2>
                        <p class="text-gray-600">Total Kategori</p>
                    </div>
                </div>
            </div>

            <!-- Pendaftar -->
            <div
                class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="flex items-center space-x-4">
                    <div class="p-4 rounded-xl bg-gradient-to-br from-[#144F5F]/20 to-[#73BA7D]/20 text-[#144F5F] text-2xl">
                        👥
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $registrationsCount }}</h2>
                        <p class="text-gray-600">Total Pendaftar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
