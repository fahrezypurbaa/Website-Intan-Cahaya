<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom kota untuk personal dan perusahaan.
     */
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('personal_city', 100)->nullable()->after('participant_type');
            $table->string('company_city', 100)->nullable()->after('company_name');
        });
    }

    /**
     * Hapus kolom kalau rollback.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['personal_city', 'company_city']);
        });
    }
};
