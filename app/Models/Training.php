<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['title','description','start_date','end_date','location'];

    // Jika peserta disimpan di tabel participants dengan kolom training_id (one-to-many):
    // public function participants()
    // {
    //     return $this->hasMany(Participant::class);
    // }

    // Jika kamu pakai many-to-many (pivot table participant_training):
    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'participant_training');
    }
}