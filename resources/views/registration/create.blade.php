@extends('layouts.app')

@section('content')
    {{-- Banner --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Registration"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow">
                PENDAFTARAN PELATIHAN
            </h1>
        </div>
    </div>

    <div class="max-w-2xl mx-auto py-12 px-6">
        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            <h2 class="text-3xl font-bold mb-6 text-[#144F5F] text-center">
                Formulir Registrasi Pelatihan
            </h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-6 text-center font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('registration.store') }}" class="space-y-6" id="registrationForm">
                @csrf

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]"
                        nullable>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]"
                        nullable>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP / WA <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]"
                        required>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori Pelatihan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Pelatihan</label>
                    <select name="category_id" id="category_id"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]"
                        nullable>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Pelatihan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pelatihan</label>
                    <select name="training_id" id="training_id"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]"
                        nullable>
                        <option value="">-- Pilih Pelatihan --</option>
                        @foreach ($trainings as $train)
                            <option value="{{ $train->id }}" data-category="{{ $train->category_id }}"
                                {{ old('training_id') == $train->id ? 'selected' : '' }}>
                                {{ $train->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('training_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jenis Peserta --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Peserta <span
                            class="text-red-500">*</span></label>
                    <select name="participant_type" id="participant_type"
                        class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]"
                        required>
                        <option value="">-- Pilih --</option>
                        <option value="personal" {{ old('participant_type') == 'personal' ? 'selected' : '' }}>Personal
                        </option>
                        <option value="company" {{ old('participant_type') == 'company' ? 'selected' : '' }}>Perusahaan
                        </option>
                    </select>
                    @error('participant_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PERSONAL FIELDS --}}
                <div id="personal_fields" class="{{ old('participant_type') == 'personal' ? '' : 'hidden' }} space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kota Domisili Personal <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="personal_city" value="{{ old('personal_city') }}"
                            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-[#73BA7D]">
                    </div>
                </div>

                {{-- COMPANY FIELDS --}}
                <div id="company_fields"
                    class="space-y-4 {{ old('participant_type') == 'company' ? '' : 'hidden' }} space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Perusahaan <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}"
                            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan</label>
                        <input type="text" name="position" value="{{ old('position') }}"
                            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kota Perusahaan <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="company_city" value="{{ old('company_city') }}"
                            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:border-[#73BA7D] focus:ring-[#73BA7D]">
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full py-3 bg-[#73BA7D] hover:bg-[#144F5F] text-white font-semibold rounded-lg shadow-md transition duration-200">
                    Daftar Sekarang
                </button>
            </form>
        </div>
    </div>
@endsection
