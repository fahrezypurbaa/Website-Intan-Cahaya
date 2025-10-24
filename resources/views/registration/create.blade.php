@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-12 px-6">
        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            <h2 class="text-3xl font-bold mb-6 text-[#144F5F] text-center">
                📝 Form Pendaftaran Pelatihan K3
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
                        class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm"
                        required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP / WA</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm"
                        required>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori Pelatihan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Pelatihan</label>
                    <select name="category_id" id="category_id"
                        class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm"
                        required>
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
                        class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm"
                        required>
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
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Peserta</label>
                    <select name="participant_type" id="participant_type"
                        class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm"
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

                {{-- Data Perusahaan --}}
                <div id="company_fields" class="space-y-4 {{ old('participant_type') == 'company' ? '' : 'hidden' }}">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Perusahaan</label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}"
                            class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan</label>
                        <input type="text" name="position" value="{{ old('position') }}"
                            class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm">
                    </div>
                </div>

                {{-- Kota Personal --}}
                <div id="personal_city_field" class="{{ old('participant_type') == 'personal' ? '' : 'hidden' }}">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kota</label>
                    <select name="personal_city" id="personal_city"
                        class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm">
                        <option value="">-- Pilih Kota --</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city }}" {{ old('personal_city') == $city ? 'selected' : '' }}>
                                {{ $city }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Kota Perusahaan --}}
                <div id="company_city_field" class="{{ old('participant_type') == 'company' ? '' : 'hidden' }}">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kota Perusahaan</label>
                    <select name="company_city" id="company_city"
                        class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm">
                        <option value="">-- Pilih Kota --</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city }}" {{ old('company_city') == $city ? 'selected' : '' }}>
                                {{ $city }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit"
                    class="w-full py-3 bg-[#73BA7D] hover:bg-[#144F5F] text-white font-semibold rounded-lg shadow-md transition duration-200">
                    Daftar Sekarang
                </button>
            </form>
        </div>
    </div>

<!-- Tom Select (CDN) -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

@endsection
