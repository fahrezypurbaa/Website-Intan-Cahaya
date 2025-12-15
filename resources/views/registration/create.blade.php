@extends('layouts.app')

@section('title', 'Pendaftaran Pelatihan K3 | Intan Safety')

@section('meta')
    <meta name="description"
        content="Formulir pendaftaran pelatihan K3 resmi dari Intan Safety. Daftar pelatihan keselamatan kerja, sertifikasi K3, dan pengembangan kompetensi profesional.">
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')

    {{-- Banner --}}
    <section class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Pendaftaran Pelatihan K3 Intan Safety"
            class="w-full h-64 object-cover rounded-lg shadow-md" width="1920" height="400">

        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow">
                Pendaftaran Pelatihan K3
            </h1>
        </div>
    </section>

    <section class="max-w-2xl mx-auto py-12 px-6">

        {{-- Intro --}}
        <header class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-[#144F5F] mb-3">
                Formulir Registrasi Pelatihan
            </h2>
            <p class="text-gray-600">
                Silakan lengkapi formulir berikut untuk mendaftar pelatihan keselamatan dan kesehatan kerja
                (K3) bersama Intan Safety.
            </p>
        </header>

        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            @if (session('success'))
                <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-6 text-center font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('registration.store') }}" class="space-y-6" id="registrationForm">
                @csrf

                {{-- Nama --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Lengkap
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                        No. HP / WhatsApp <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Kategori Pelatihan
                    </label>
                    <select name="category_id" id="category_id"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Pelatihan --}}
                <div>
                    <label for="training_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Pelatihan
                    </label>
                    <select name="training_id" id="training_id"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                        <option value="">-- Pilih Pelatihan --</option>
                        @foreach ($trainings as $train)
                            <option value="{{ $train->id }}" data-category="{{ $train->category_id }}"
                                {{ old('training_id') == $train->id ? 'selected' : '' }}>
                                {{ $train->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Participant --}}
                <div>
                    <label for="participant_type" class="block text-sm font-semibold text-gray-700 mb-2">
                        Jenis Peserta <span class="text-red-500">*</span>
                    </label>
                    <select name="participant_type" id="participant_type" required
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                        <option value="">-- Pilih --</option>
                        <option value="personal" {{ old('participant_type') == 'personal' ? 'selected' : '' }}>
                            Personal
                        </option>
                        <option value="company" {{ old('participant_type') == 'company' ? 'selected' : '' }}>
                            Perusahaan
                        </option>
                    </select>
                </div>

                {{-- Personal --}}
                <div id="personal_fields" class="{{ old('participant_type') == 'personal' ? '' : 'hidden' }}">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kota Domisili <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="personal_city" value="{{ old('personal_city') }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm">
                </div>

                {{-- Company --}}
                <div id="company_fields" class="{{ old('participant_type') == 'company' ? '' : 'hidden' }} space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Perusahaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}"
                            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jabatan
                        </label>
                        <input type="text" name="position" value="{{ old('position') }}"
                            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kota Perusahaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="company_city" value="{{ old('company_city') }}"
                            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm">
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full py-3 bg-[#73BA7D] hover:bg-[#144F5F] text-white font-semibold rounded-lg shadow-md transition">
                    Daftar Sekarang
                </button>
            </form>
        </div>
    </section>

@endsection
