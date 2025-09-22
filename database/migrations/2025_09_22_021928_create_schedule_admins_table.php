<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
     Schema::create('schedule_admins', function (Blueprint $table) {
    $table->id();
    $table->string('title');        // Nama pelatihan
    $table->date('start_date');     // Tanggal mulai
    $table->date('end_date');       // Tanggal selesai
    $table->string('location')->nullable(); // Lokasi / Online / Offline
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_admins');
    }
};
