<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::table('articles', function (Blueprint $table) {
        if (!Schema::hasColumn('articles', 'author_name')) {
            $table->string('author_name')->default('Admin')->after('image');
        }

        if (!Schema::hasColumn('articles', 'author_bio')) {
            $table->text('author_bio')->nullable()->after('author_name');
        }

        if (!Schema::hasColumn('articles', 'views')) {
            // Ubah: letakkan setelah kolom 'image' biar aman
            $table->unsignedBigInteger('views')->default(0)->after('image');
        }

        if (!Schema::hasColumn('articles', 'reading_time')) {
            $table->string('reading_time')->nullable()->after('views');
        }

        if (!Schema::hasColumn('articles', 'meta_title')) {
            $table->string('meta_title')->nullable()->after('reading_time');
        }

        if (!Schema::hasColumn('articles', 'meta_description')) {
            $table->text('meta_description')->nullable()->after('meta_title');
        }
    });
}


   public function down(): void
{
    Schema::table('articles', function (Blueprint $table) {
        $table->dropColumn([
            'author_name',
            'author_bio',
            'views',
            'reading_time',
            'meta_title',
            'meta_description',
        ]);
    });
}

};
