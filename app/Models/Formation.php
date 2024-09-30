<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    /**
     * Désactive l'auto-incrémentation de l'ID.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Définit le type de la clé primaire.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Les attributs pouvant être remplis en masse.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'promo', 'nom', 'description', 'cout', 'heures_par_semaine'
    ];

    /**
     * Définit le nom de la clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Les colonnes qui doivent être considérées comme des dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

     // Relation avec le domaine
     public function domaine()
     {
         return $this->belongsTo(Domaine::class);
     }
}
