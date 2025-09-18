<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('hubungi-kami');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'pesan'   => 'required|string',
        ]);

        Contact::create([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'telepon' => $request->telepon,
            'pesan'   => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
