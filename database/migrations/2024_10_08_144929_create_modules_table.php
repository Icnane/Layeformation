<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Le titre est requis
            $table->text('description')->nullable(); // Description optionnelle
            $table->string('video_url')->nullable(); // URL de la vidéo optionnelle
            $table->unsignedBigInteger('formation_id'); // Type correspondant à la table formations

            // Déclaration de la clé étrangère
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
