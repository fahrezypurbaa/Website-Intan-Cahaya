<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('training_rundowns', function (Blueprint $table) {
        $table->id();
        $table->foreignId('training_id')->constrained()->onDelete('cascade');
        $table->string('day');      // contoh: Hari 1, Hari 2
        $table->string('time');       // contoh: 08:00
        $table->string('activity'); // contoh: Registrasi, Pembukaan, Materi A
        $table->timestamps();
    });

    
}

public function down()
{
    Schema::dropIfExists('training_rundowns');
}

};
