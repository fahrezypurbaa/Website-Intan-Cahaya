<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Services\TelegramService;

class RegistrationController extends Controller
{
    public function create()
    {
        // Ambil semua kategori & pelatihan
        $categories = Category::all();
        $trainings = Training::all();

        // Daftar kota seluruh Indonesia (versi ringkas)
        // Kalau mau versi lengkap (514 kota/kabupaten), aku bisa kirimkan file JSON siap pakai.
        $cities = [
            'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang', 'Makassar', 'Palembang', 'Bekasi',
            'Depok', 'Tangerang', 'Bogor', 'Malang', 'Yogyakarta', 'Denpasar', 'Batam', 'Padang',
            'Pontianak', 'Banjarmasin', 'Samarinda', 'Pekanbaru', 'Balikpapan', 'Cirebon', 'Solo',
            'Manado', 'Mataram', 'Kupang', 'Jayapura', 'Ambon', 'Serang', 'Cilegon', 'Tegal',
            'Banda Aceh', 'Tasikmalaya', 'Cimahi', 'Kediri', 'Magelang', 'Probolinggo', 'Pekalongan',
            'Jambi', 'Bengkulu', 'Palangkaraya', 'Gorontalo', 'Ternate', 'Tidore', 'Tarakan'
        ];

        return view('registration.create', compact('categories', 'trainings', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email' => 'required|email',
            'phone'            => 'required|string|max:20',
            'participant_type' => 'required|in:personal,company',
            'category_id'      => 'required|exists:categories,id',
            'training_id'      => 'required|exists:trainings,id',
            'personal_city'    => 'nullable|string|max:100',
            'company_name'     => 'nullable|string|max:255',
            'position'         => 'nullable|string|max:255',
            'company_city'     => 'nullable|string|max:100',
        ]);

        // Simpan data ke database
        $reg = Registration::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'participant_type' => $request->participant_type,
            'personal_city'    => $request->participant_type === 'personal' ? $request->personal_city : null,
            'company_name'     => $request->participant_type === 'company' ? $request->company_name : null,
            'company_city'     => $request->participant_type === 'company' ? $request->company_city : null,
            'position'         => $request->participant_type === 'company' ? $request->position : null,
            'category_id'      => $request->category_id,
            'training_id'      => $request->training_id,
        ]);

        // 🔔 Kirim notif ke Telegram
        $category = $reg->category->name ?? '-';
        $training = $reg->training->title ?? '-';

        $message = "📢 <b>Pendaftaran Baru</b>\n"
                 . "👤 Nama: {$reg->name}\n"
                 . "📧 Email: {$reg->email}\n"
                 . "📱 HP: {$reg->phone}\n"
                 . "🏷️ Kategori: {$category}\n"
                 . "🎓 Pelatihan: {$training}\n"
                 . "🏢 Jenis: {$reg->participant_type}\n";

        if ($reg->participant_type === 'company') {
            $message .= "🏭 Perusahaan: {$reg->company_name}\n";
            $message .= "🏙️ Kota Perusahaan: {$reg->company_city}\n";
            $message .= "💼 Jabatan: {$reg->position}\n";
        } else {
            $message .= "🏙️ Kota: {$reg->personal_city}\n";
        }

        $message .= "🕒 Waktu: " . now()->format('d M Y H:i');

        TelegramService::sendMessage($message);

        return redirect()->route('registration.success');
    }

    public function success()
    {
        $adminWa = '6281234567890'; // nomor admin utama
        return view('registration.success', compact('adminWa'));
    }
}
