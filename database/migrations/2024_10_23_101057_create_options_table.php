<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            // Définition de la clé primaire auto-incrémentée
            $table->id();

            // Définition de la clé étrangère 'question_id', liée à la table 'questions'
            $table->foreignId('question_id')
                  ->constrained() // Crée la contrainte sur la table 'questions'
                  ->onDelete('cascade'); // Si la question est supprimée, toutes les options associées sont supprimées aussi

            // Texte de l'option (la réponse possible)
            $table->string('text');

            // Indicateur si l'option est correcte ou non
            $table->boolean('is_correct')->default(false); // Par défaut, l'option est incorrecte

            // Timestamps pour les dates de création et de mise à jour
            $table->timestamps();
        });
    }

    public function down()
    {
        // Suppression de la table 'options' si la migration est annulée
        Schema::dropIfExists('options');
    }
}
