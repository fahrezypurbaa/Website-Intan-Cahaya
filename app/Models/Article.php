<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'thumbnail',
        'author_name', 'author_bio', 'views', 'reading_time',
        'meta_title', 'meta_description',
    ];

    // Relasi ke User (opsional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hitung waktu baca otomatis (200 kata per menit)
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200);

        return $minutes . ' menit baca';
    }
}
