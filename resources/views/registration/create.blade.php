@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6">Form Pendaftaran Pelatihan K3</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('registration.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" 
                class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block">No. HP / WA</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block">Jenis Peserta</label>
            <select name="participant_type" id="participant_type" 
                class="w-full border px-3 py-2 rounded" required>
                <option value="">-- Pilih --</option>
                <option value="personal" {{ old('participant_type') == 'personal' ? 'selected' : '' }}>Personal</option>
                <option value="company" {{ old('participant_type') == 'company' ? 'selected' : '' }}>Perusahaan</option>
            </select>
        </div>

        <div id="company_fields" class="{{ old('participant_type') == 'company' ? '' : 'hidden' }}">
            <div>
                <label class="block">Nama Perusahaan</label>
                <input type="text" name="company_name" value="{{ old('company_name') }}"
                    class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label class="block">Jabatan</label>
                <input type="text" name="position" value="{{ old('position') }}"
                    class="w-full border px-3 py-2 rounded">
            </div>
        </div>

        <button type="submit" 
            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Daftar
        </button>
    </form>
</div>

<script>
    const participantType = document.getElementById('participant_type');
    const companyFields = document.getElementById('company_fields');

    participantType.addEventListener('change', function () {
        if (this.value === 'company') {
            companyFields.classList.remove('hidden');
        } else {
            companyFields.classList.add('hidden');
        }
    });
</script>
@endsection
