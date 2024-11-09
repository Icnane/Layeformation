<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('text');  // Texte de la question
            $table->enum('type', ['multiple_choice', 'true_false', 'short_answer']);  // Type de question
            $table->unsignedBigInteger('quiz_id');  // Référence au quiz
            $table->timestamps();
    
            // Clé étrangère vers la table des quizzes
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');

            // Index sur quiz_id pour de meilleures performances
            $table->index('quiz_id');
        });

        // Création de la table des réponses
        Schema::create('reponses', function (Blueprint $table) {
            $table->id();  // Crée une colonne 'id' avec auto-incrémentation
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');  // Relation avec les questions
            $table->text('reponse_text');  // Texte de la réponse
            $table->boolean('is_correct');  // Indique si la réponse est correcte
            $table->timestamps();  // Ajoute les colonnes 'created_at' et 'updated_at'
        });
    }

    public function down()
    {
        // Suppression des tables dans l'ordre inverse
        Schema::dropIfExists('reponses');
        Schema::dropIfExists('questions');
    }
}
