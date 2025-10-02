@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-6">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
        <h2 class="text-3xl font-bold mb-6 text-[#144F5F] text-center">
            📝 Form Pendaftaran Pelatihan K3
        </h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-6 text-center font-medium">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('registration.store') }}" class="space-y-6" id="registrationForm">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP / WA</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                    class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Peserta</label>
                <select name="participant_type" id="participant_type" 
                    class="w-full border border-gray-300 focus:border-[#73BA7D] focus:ring-[#73BA7D] px-4 py-2 rounded-lg shadow-sm" required>
                    <option value="">-- Pilih --</option>
                    <option value="personal" {{ old('participant_type') == 'personal' ? 'selected' : '' }}>Personal</option>
                    <option value="company" {{ old('participant_type') == 'company' ? 'selected' : '' }}>Perusahaan</option>
                </select>
            </div>

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

            <button type="submit" 
                class="w-full py-3 bg-[#73BA7D] hover:bg-[#144F5F] text-white font-semibold rounded-lg shadow-md transition duration-200">
                Daftar Sekarang
            </button>
        </form>
    </div>
</div>
@endsection
