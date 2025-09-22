@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6">Form Pendaftaran</h2>

    <form method="POST" action="{{ route('registration.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block">Nama</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div>
            <label class="block">Email</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block">No HP</label>
            <input type="text" name="phone" class="w-full border px-3 py-2 rounded" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Daftar</button>
    </form>
</div>
@endsection
