<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'chemin_video', // si vous avez ce champ
        'module_id', // Ajoutez ceci
    ];

    // Définir la relation avec Module
    
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function chapitres()
    {
        return $this->hasMany(Chapitre::class);
    }

    }

