<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Support\Facades\Response;

class RegistrationAdminController extends Controller
{
    public function index()
    {
        // ambil semua data registrasi tanpa jadwal
        $registrations = Registration::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.registrations.index', compact('registrations'));
    }

    public function export()
    {
        $filename = 'registrations_'.now()->format('Y-m-d_H-i-s').'.csv';

        $registrations = \App\Models\Registration::with(['training', 'training.category'])->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ];

        $columns = [
            'No', 'Nama', 'Email', 'No HP', 'Tipe Peserta', 'Nama Perusahaan',
            'Jabatan', 'Kota', 'Nama Pelatihan', 'Jenis Pelatihan',
            'Tanggal Daftar', 'Waktu Daftar',
        ];

        $callback = function () use ($registrations, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($registrations as $index => $reg) {
                fputcsv($file, [
                    $index + 1,
                    $reg->name,
                    $reg->email,
                    $reg->phone,
                    $reg->participant_type,
                    $reg->company_name,
                    $reg->position,
                    $reg->participant_type === 'company' ? $reg->company_city : $reg->personal_city,
                    $reg->training->title ?? '-',
                    $reg->training->category->name ?? '-',
                    $reg->created_at->format('d M Y'),
                    $reg->created_at->format('H:i'),
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
