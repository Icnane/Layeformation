<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();  // Crée une colonne 'id' avec auto-incrémentation
            $table->text('answer_text');  // Texte de la réponse
            $table->foreignId('question_id')  // Colonne pour la clé étrangère vers 'questions'
                  ->constrained('questions')  // Crée la contrainte de clé étrangère
                  ->onDelete('cascade');  // Suppression en cascade des réponses si la question est supprimée
            $table->boolean('is_correct')->default(false);  // Réponse correcte, valeur par défaut 'false'
            $table->timestamps();  // Ajoute les colonnes 'created_at' et 'updated_at'
            
            $table->index('question_id');  // Ajoute un index explicite pour améliorer la recherche sur question_id
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers');  // Supprime la table 'answers' si elle existe
    }
}
