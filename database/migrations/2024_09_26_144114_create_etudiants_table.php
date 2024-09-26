<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->string('id')->primary(); 
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->bigInteger('tel'); // Numéro de téléphone
            $table->enum('sexe', ['homme', 'femme']);
            $table->integer('age');
            $table->string('formation');
            $table->string('mode'); // En ligne ou présentiel
            $table->string('ville');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
};
