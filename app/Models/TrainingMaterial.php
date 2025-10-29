<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'group_name',
        'kode_unit',
        'title',
        'jp',
        'order'
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
