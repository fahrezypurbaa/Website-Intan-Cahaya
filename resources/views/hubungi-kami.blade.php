@extends('layouts.app')

@section('title', 'Hubungi Kami - Intan Safety')

@section('content')
    {{-- Banner Kontak Kami --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Kontak Kami"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-end pr-8">
            <h1 class="text-3xl md:text-4xl font-bold text-white">
                KONTAK KAMI</h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-8">
            Kontak Informasi<br>
            <span class="text-[#73BA7D] text-lg font-medium">hubungi kami segera</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Informasi Kontak --}}
            <div class="bg-white p-6 rounded-2xl shadow-md">
  <ul class="space-y-5">
    <!-- Jam -->
    <li class="flex items-center">
      <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 mr-3">
        <!-- Icon Clock -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </span>
      <span class="text-gray-900">Senin - Jumat (08.00 - 16.30)</span>
    </li>

    <!-- Telepon -->
    <li class="flex items-center">
      <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 mr-3">
        <!-- Icon Phone -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 5a2 2 0 012-2h2.28a1 1 0 01.948.684l1.2 3.6a1 1 0 01-.272 1.06l-1.67 1.67a16.001 16.001 0 006.586 6.586l1.67-1.67a1 1 0 011.06-.272l3.6 1.2a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
        </svg>
      </span>
      <span class="text-gray-900">082146134846</span>
    </li>

    <!-- Email -->
    <li class="flex items-center">
      <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 mr-3">
        <!-- Icon Mail -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
      </span>
      <span class="text-gray-900">admin@intancahayamandiri.com</span>
    </li>

    <!-- Lokasi -->
    <li class="flex items-start">
      <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 mr-3">
        <!-- Icon Map Pin -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 22s8-4.5 8-12a8 8 0 10-16 0c0 7.5 8 12 8 12z" />
        </svg>
      </span>
      <span class="text-gray-900">
        Jl. Panggungan Asri No.37, RT.003/RW.033, Mayaan, Trihanggo, Gamping, <br>
        Kabupaten Sleman, Yogyakarta 55291
      </span>
    </li>
  </ul>
</div>


            {{-- Formulir --}}
            <div class="bg-green-50 p-6 rounded-2xl shadow-md">
                @if (session('success'))
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
                    <button type="submit"
                        class="w-full py-3 bg-[#73BA7D] text-white rounded-lg hover:bg-green-700 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        {{-- Google Maps --}}
        <div class="mt-12">
            <h3 class="text-xl font-semibold text-center text-gray-800 mb-4">Lokasi Kami</h3>
            <div class="w-full h-96 rounded-lg overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.200938662273!2d110.34327842318369!3d-7.768504581162453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a596b3d0c6d2d%3A0xf17c39d1f640532a!2sPT%20INTAN%20CAHAYA%20MANDIRI!5e0!3m2!1sid!2sid!4v1758184317801!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
@endsection
