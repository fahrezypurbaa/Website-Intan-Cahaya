<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingRundown extends Model
{
    protected $fillable = [
        'training_id', 
        'day', 
        'time', 
        'instructor'
        // materials dihapus
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}