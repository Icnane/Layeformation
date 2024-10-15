<?php

// app/Models/Domaine.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'nom', 'logo'];

    // Relation avec les formations
    public function formations()
    {
        return $this->hasMany(Formation::class, 'domaine_id', 'id'); // Assurez-vous que le 'domaine_id' correspond à la clé primaire
    }
}
