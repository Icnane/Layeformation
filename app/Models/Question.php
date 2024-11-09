<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Définir les champs autorisés à la création et à la mise à jour
    protected $fillable = ['text', 'type', 'quiz_id'];

    /**
     * Relation avec le quiz.
     * Une question appartient à un quiz.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class); // La relation entre une question et un quiz
    }

    /**
     * Relation avec les options de réponse.
     * Une question peut avoir plusieurs options.
     */
    public function options()
    {
        return $this->hasMany(Option::class); // Une question peut avoir plusieurs options
    }
}
