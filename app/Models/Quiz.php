<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    // Définir les champs autorisés à la création et à la mise à jour
    protected $fillable = ['titre', 'chapitre_id', 'module_id', 'options'];

    /**
     * Relation avec le chapitre.
     * Un quiz appartient à un chapitre.
     */
    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class); // Un quiz appartient à un chapitre
    }

    /**
     * Relation avec le module.
     * Un quiz appartient à un module.
     */
    public function module()
    {
        return $this->belongsTo(Module::class); // Un quiz appartient à un module
    }

    /**
     * Relation avec les questions.
     * Un quiz peut avoir plusieurs questions.
     */
    public function questions()
    {
        return $this->hasMany(Question::class); // Un quiz a plusieurs questions
    }

    /**
     * Créer ou mettre à jour un quiz avec ses questions et options.
     *
     * @param array $data
     * @return Quiz
     */
    public static function createOrUpdateQuiz($data)
    {
        // Crée ou met à jour le quiz
        $quiz = self::updateOrCreate(
            ['id' => $data['id'] ?? null], // Si 'id' est passé, met à jour le quiz, sinon crée un nouveau
            [
                'titre' => $data['titre'],
                'chapitre_id' => $data['chapitre_id'],
                'module_id' => $data['module_id'],
                'options' => $data['options'] ?? null, // Les options en format JSON
            ]
        );

        // Si des questions sont présentes dans les données
        if (isset($data['questions']) && is_array($data['questions'])) {
            foreach ($data['questions'] as $questionData) {
                // Crée ou met à jour chaque question
                $question = $quiz->questions()->updateOrCreate(
                    ['id' => $questionData['id'] ?? null],
                    ['question_text' => $questionData['text']] // Assurez-vous que 'text' est bien défini dans les données
                );

                // Crée ou met à jour les options associées à chaque question
                if (isset($questionData['options']) && is_array($questionData['options'])) {
                    foreach ($questionData['options'] as $optionData) {
                        // Assurez-vous que chaque option a un texte et une validité
                        $question->options()->updateOrCreate(
                            ['text' => $optionData['text']],
                            ['text' => $optionData['text'], 'is_correct' => $optionData['is_correct']]
                        );
                    }
                }
            }
        }

        return $quiz;
    }
}
