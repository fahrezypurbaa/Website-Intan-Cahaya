{{-- @extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4">
        <h2 class="text-3xl font-bold mb-8 text-center">Layanan Pelatihan & Sertifikasi</h2>

        @foreach ($categories as $kategori => $pelatihans)
            <div class="mb-12">
                <h3 class="text-2xl font-semibold text-[#73BA7D] mb-4">{{ $kategori }}</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach ($pelatihans as $p)
                        <div class="border rounded-lg p-4 shadow-sm hover:shadow-md transition">
                            <h4 class="text-lg font-bold">{{ $p->title }}</h4>
                            <p class="text-gray-600">📍 {{ $p->location ?? 'Lokasi menyusul' }}</p>
                            <p class="text-gray-600">🗓 {{ \Carbon\Carbon::parse($p->start_date)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($p->end_date)->format('d M Y') }}</p>
                            <a href="#"
                                class="mt-3 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                Daftar
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection --}}
