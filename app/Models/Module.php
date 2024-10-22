<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_id', // Lien avec la formation
        'titre',
        'description',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function chapitres()
    {
        return $this->hasMany(Chapitre::class);
    }
}
