<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->string('group_name')->nullable(); // contoh: Kelompok Dasar, Inti, dll
            $table->string('title'); // nama materi
            $table->integer('jp')->default(0); // jumlah jam pelajaran
            $table->integer('order')->nullable(); // urutan tampil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_materials');
    }
};
