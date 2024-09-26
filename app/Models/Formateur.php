<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    /**
     * Indique que l'auto-incrémentation de l'ID est désactivée.
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
     * Définit la clé primaire personnalisée.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'email',
        'contact',
    ];
}
