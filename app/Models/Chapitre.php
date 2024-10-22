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
        'chemin_video',
        'module_id',
    ];

    // Relation avec le modèle Module
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
