<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',        // Ajoutez le champ titre ici
        'formation_id', // Lien avec la formation
        'description',
    ];

    public function chapitre()
    {
        return $this->hasMany(Chapitre::class);
    }
    
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    // Relation avec les chapitres
    public function chapitres()
    {
        return $this->hasMany(Chapitre::class); // Relation avec les chapitres
    }
}
