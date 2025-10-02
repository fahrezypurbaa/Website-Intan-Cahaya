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
    Schema::table('training_rundowns', function (Blueprint $table) {
        $table->string('time')->after('day');
    });
}

public function down()
{
    Schema::table('training_rundowns', function (Blueprint $table) {
        $table->dropColumn('time');
    });
}

};
