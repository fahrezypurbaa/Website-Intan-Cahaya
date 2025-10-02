<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'slug', 'description',
        'duration', 'requirement', 'mode', 'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function materials()
{
    return $this->hasMany(TrainingMaterial::class)->orderBy('order');
}

}
