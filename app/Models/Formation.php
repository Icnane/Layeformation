<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public $incrementing = false; // Vérifier si c'est nécessaire
    protected $keyType = 'integer'; // Vérifier le type de clé

    protected $fillable = [
        'id', 'promo', 'nom', 'domaine_id', 'description', 'cout', 'heures_par_semaine'
    ];

    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];

    // Relation avec le domaine
    public function domaine()
    {
        return $this->belongsTo(Domaine::class, 'domaine_id', 'id');
    }

    public function showInscriptionForm()
{
    // Récupérer toutes les formations
    $formations = Formation::all(); // ou une méthode appropriée pour récupérer les formations

    // Passer les formations à la vue
    return view('partials.inscription', compact('formations'));
}
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
