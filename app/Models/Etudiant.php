<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    // Spécifiez la table associée au modèle
    protected $table = 'etudiants';

    // Définissez la clé primaire
    protected $primaryKey = 'id';

    // Définissez les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'email',
        'tel',
        'sexe',
        'age',
        'formation',
        'mode',
        'ville',
    ];

    // Si vous avez besoin de relations, définissez-les ici
    // Exemple : public function formation() { return $this->belongsTo(Formation::class, 'formation', 'id'); }
}
