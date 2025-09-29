@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Training -->
            <div class="bg-white p-6 rounded shadow flex items-center space-x-4">
                <div class="p-4 rounded-full bg-white border-2 border-[#144F5F] text-[#144F5F]">
                    📚
                </div>
                <div>
                    <h2 class="text-xl font-bold">{{ $trainingsCount }}</h2>
                    <p class="text-gray-600">Total Training</p>
                </div>
            </div>

            <!-- Kategori -->
            <div class="bg-white p-6 rounded shadow flex items-center space-x-4">
                <div class="p-4 rounded-full bg-white border-2 border-[#73BA7D] text-[#73BA7D]">
                    🗂️
                </div>
                <div>
                    <h2 class="text-xl font-bold">{{ $categoriesCount }}</h2>
                    <p class="text-gray-600">Total Kategori</p>
                </div>
            </div>

            <!-- Pendaftar -->
            <div class="bg-white p-6 rounded shadow flex items-center space-x-4">
                <div class="p-4 rounded-full bg-white border-2 border-[#144F5F] text-[#144F5F]">
                    👥
                </div>
                <div>
                    <h2 class="text-xl font-bold">{{ $registrationsCount }}</h2>
                    <p class="text-gray-600">Total Pendaftar</p>
                </div>
            </div>
        </div>
    </div>
@endsection
