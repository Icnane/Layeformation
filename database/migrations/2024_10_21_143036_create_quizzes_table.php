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
            $table->unsignedBigInteger('chapitre_id'); // Clé étrangère vers la table chapitres
            $table->foreignId('module_id')->nullable()->constrained();// Clé étrangère vers la table modules
            $table->string('titre'); // Titre du quiz
            $table->json('options')->nullable(); // Champ pour les options en JSON (optionnel)
            $table->timestamps();

            // Déclaration de la clé étrangère pour la relation avec chapitres
            $table->foreign('chapitre_id')->references('id')->on('chapitres')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('module')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
