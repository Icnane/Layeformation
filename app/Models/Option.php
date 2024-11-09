<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    // Définir les champs autorisés à la création et à la mise à jour
    protected $fillable = ['text', 'is_correct', 'question_id'];

    /**
     * Relation avec la question.
     * Une option appartient à une question.
     */
    public function question()
    {
        return $this->belongsTo(Question::class); // Chaque option appartient à une question
    }

    /**
     * Option est correcte ou non.
     * Ajout d'un attribut 'is_correct' pour déterminer si l'option est correcte.
     */
    public function isCorrect()
    {
        return $this->is_correct; // Cette fonction retourne si l'option est correcte
    }
}
