<?php

// database/migrations/xxxx_xx_xx_create_resources_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Titre de la ressource
            $table->text('text_content')->nullable(); // Contenu texte long
            $table->string('video_path')->nullable(); // Chemin de la vidéo
            $table->foreignId('module_id')->constrained()->onDelete('cascade'); // ID du module associé
            $table->foreignId('chapitre_id')->constrained()->onDelete('cascade'); // ID du chapitre associé
            $table->timestamps(); // Dates de création et de mise à jour
        });
    }

    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
