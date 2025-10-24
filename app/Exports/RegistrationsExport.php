<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Registration::with(['training', 'training.category'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Email',
            'No HP',
            'Tipe Peserta',
            'Nama Perusahaan',
            'Jabatan',
            'Kota',
            'Nama Pelatihan',
            'Jenis Pelatihan',
            'Tanggal Daftar',
            'Waktu Daftar',
        ];
    }

    public function map($reg): array
    {
        static $index = 0;
        $index++;

        return [
            $index,
            $reg->name ?? '-',
            $reg->email ?? '-',
            $reg->phone ?? '-',
            $reg->participant_type ?? '-',
            $reg->company_name ?? '-',
            $reg->position ?? '-',
            $reg->participant_type === 'company'
                ? ($reg->company_city ?? '-')
                : ($reg->personal_city ?? '-'),
            optional($reg->training)->title ?? '-',
            optional(optional($reg->training)->category)->name ?? '-',
            $reg->created_at ? $reg->created_at->format('d M Y') : '-',
            $reg->created_at ? $reg->created_at->format('H:i') : '-',
        ];
    }
}
