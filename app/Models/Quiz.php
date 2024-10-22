<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['chapitre_id', 'question', 'options', 'correct_option'];

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }
}
