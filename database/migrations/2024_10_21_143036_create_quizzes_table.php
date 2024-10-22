<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapitre_id'); // Lien vers la table chapitres
            $table->string('question');
            $table->json('options'); // Options de réponse (stockées en JSON)
            $table->string('correct_option'); // Option correcte
            $table->timestamps();

            // Déclaration de la clé étrangère
            $table->foreign('chapitre_id')->references('id')->on('chapitres')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
