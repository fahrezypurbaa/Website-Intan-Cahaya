<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'slug', 'description',
        'duration', 'requirement', 'facilities', 'mode', 'image', 'brochure_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function materials()
    {
        return $this->hasMany(TrainingMaterial::class)->orderBy('order');
    }

    public function rundowns()
    {
        return $this->hasMany(TrainingRundown::class);
    }
}
