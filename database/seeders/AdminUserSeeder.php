<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Intan Jogja',
            'email' => 'adminintanjogja@gmail.com',
            'password' => Hash::make('intanjogja123'),
            'email_verified_at' => now(),
        ]);
    }
}
