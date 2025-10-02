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
    Schema::table('registrations', function (Blueprint $table) {
        $table->string('participant_type')->nullable(); // personal / company
        $table->string('company_name')->nullable();
        $table->string('position')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('registrations', function (Blueprint $table) {
        $table->dropColumn(['participant_type', 'company_name', 'position']);
    });
}

};
