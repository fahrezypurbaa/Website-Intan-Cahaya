<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInstructorToTrainingRundownsTable extends Migration
{
    public function up()
    {
        Schema::table('training_rundowns', function (Blueprint $table) {
            $table->string('instructor')->nullable()->after('time');
        });
    }

    public function down()
    {
        Schema::table('training_rundowns', function (Blueprint $table) {
            $table->dropColumn('instructor');
        });
    }
}