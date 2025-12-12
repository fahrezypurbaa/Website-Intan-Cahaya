<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = \Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = \Str::slug($category->name);
        });
    }
}
