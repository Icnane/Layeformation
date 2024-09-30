<?php

// app/Models/Domaine.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;
    // Définissez la clé primaire
    protected $primaryKey = 'id';
    public $incrementing = false;  // Désactivation de l'auto-incrémentation pour l'ID

    protected $fillable = ['id', 'nom', 'logo'];

    // Relation avec les formations
    public function formations()
    {
        return $this->hasMany(Formation::class, 'domaine_id');
    }
}
