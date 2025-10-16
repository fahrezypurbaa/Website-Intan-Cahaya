<div class="max-w-3xl mx-auto py-10">
    {{-- Judul --}}
    <h1 class="text-3xl font-bold mb-8 text-gray-800">{{ $title }}</h1>

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
            <strong class="block mb-2">Terjadi kesalahan:</strong>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card Form --}}
    <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
        @php
            // Normalisasi default
            $method = strtoupper($method ?? 'POST');
            $enctype = $enctype ?? 'application/x-www-form-urlencoded';
        @endphp

        <form action="{{ $action }}" method="POST" enctype="{{ $enctype }}" class="space-y-6">
            @csrf

            {{-- Kalau bukan POST atau GET, spoofing method --}}
            @if (!in_array($method, ['POST', 'GET']))
                @method($method)
            @endif

            {{-- Isi form dinamis --}}
            {{ $slot }}

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ $back }}" 
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-[#73BA7D] to-[#4ca56c] text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
                    {{ $submitLabel ?? '💾 Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
