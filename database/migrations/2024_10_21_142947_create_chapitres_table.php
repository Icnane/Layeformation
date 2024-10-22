<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapitresTable extends Migration
{
    public function up()
    {
        Schema::create('chapitres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('chemin_video')->nullable();
            $table->foreignId('module_id')->constrained()->onDelete('cascade'); // Lien vers le module
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chapitres');
    }
}
