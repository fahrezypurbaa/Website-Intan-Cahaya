<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'phone' => 'required|string',
        ]);

        Registration::create($request->only('name', 'email', 'phone'));

        return redirect()->route('registration.success');
    }

    public function success()
    {
        $adminWa = '6281234567890'; // nomor admin

        return view('registration.success', compact('adminWa'));
    }
}
