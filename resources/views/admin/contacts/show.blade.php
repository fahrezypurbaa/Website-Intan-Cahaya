@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow rounded-xl p-6 border border-gray-100">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">📄 Detail Pesan</h1>

    <div class="space-y-4 text-gray-700">
        <div>
            <p class="font-semibold text-gray-900">Nama:</p>
            <p>{{ $contact->nama }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-900">Email:</p>
            <p>{{ $contact->email }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-900">Tanggal:</p>
            <p>{{ $contact->created_at->format('d M Y H:i') }}</p>
        </div>

        <div>
            <p class="font-semibold text-gray-900">Pesan:</p>
            <div class="whitespace-pre-line border rounded-lg p-4 bg-gray-50 mt-1 leading-relaxed text-gray-800">
                {{ $contact->pesan }}
            </div>
        </div>
    </div>

    {{-- Tombol kembali --}}
    <div class="mt-8 flex justify-end">
        <a href="{{ route('admin.contacts.index') }}"
           class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold text-base rounded-md shadow-md transition">
            Kembali
        </a>
    </div>
</div>
@endsection
