<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Training extends Model
{
    protected $fillable = [
        'category_id','title','slug','description',
        'duration','requirement','mode','image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}