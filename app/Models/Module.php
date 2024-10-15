<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training; 

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'domaine_id', // Si le module est lié à un domaine
        'video_url', // Ajouté ici
        'training_id', // Ajouté ici
        'created_at',
        'updated_at',
    ];

    // Relation avec le domaine
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    // Si le module a plusieurs formations
    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    // Relation avec la formation, si applicable
    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
