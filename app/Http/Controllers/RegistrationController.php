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

        return view('registration.create', compact('categories', 'trainings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|unique:registrations,email',
            'phone'            => 'required|string|max:20',
            'participant_type' => 'required|in:personal,company',
            'company_name'     => 'nullable|string|max:255',
            'position'         => 'nullable|string|max:255',
            'category_id'      => 'required|exists:categories,id',
            'training_id'      => 'required|exists:trainings,id',
        ]);

        $reg = Registration::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'participant_type' => $request->participant_type,
            'company_name'     => $request->participant_type === 'company' ? $request->company_name : null,
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
            $message .= "💼 Jabatan: {$reg->position}\n";
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
