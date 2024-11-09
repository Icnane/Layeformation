<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;

    // Les champs qui peuvent être assignés en masse
    protected $fillable = [
        'titre',
        'description',
        'chemin_video',
        'module_id',
    ];

    // Définir la relation avec Module
    public function module()
    {
        return $this->belongsTo(Module::class); // Chaque chapitre appartient à un module
    }

    // Relation pour le ou les quiz associés
    public function quiz()
    {
        return $this->hasMany(Quiz::class); // Un chapitre peut avoir plusieurs quiz
    }

    // Relation pour les ressources liées à un chapitre (par exemple des fichiers ou autres matériels)
    public function resources()
    {
        return $this->hasMany(Resource::class); // Chaque chapitre peut avoir plusieurs ressources
    }
}
