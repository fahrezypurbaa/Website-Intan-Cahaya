<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'participant_type',
        'company_name',
        'position',
        'category_id',
        'training_id',
    ];

    // 🔹 Relasi ke tabel trainings
    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    // 🔹 Relasi ke tabel categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
