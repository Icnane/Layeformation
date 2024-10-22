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
            $table->string('title')->nullable();
            $table->text('text_content')->nullable(); // Pour les textes longs
            $table->string('video_path')->nullable(); // Pour les vidéos
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->foreignId('chapitre_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
