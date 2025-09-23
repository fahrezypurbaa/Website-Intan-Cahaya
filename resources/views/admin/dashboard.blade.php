@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-xl font-bold">{{ $trainingsCount }}</h2>
                <p class="text-gray-600">Total Training</p>
            </div>
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-xl font-bold">{{ $categoriesCount }}</h2>
                <p class="text-gray-600">Total Kategori</p>
            </div>
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-xl font-bold">{{ $registrationsCount }}</h2>
                <p class="text-gray-600">Total Pendaftar</p>
            </div>
        </div>
    </div>
@endsection
