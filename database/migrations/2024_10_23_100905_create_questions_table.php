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
            $table->unsignedBigInteger('quizzes_id'); // Lien vers la table quiz
            $table->string('text'); // Texte de la question
            $table->string('type'); // Type de la question (multiple, vrai/faux)
            $table->json('options'); // Stocke les options en JSON
            $table->timestamps();

            // Déclaration de la clé étrangère
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
