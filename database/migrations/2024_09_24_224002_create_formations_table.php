<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->integer('id')->primary();  // Définition manuelle de l'ID
            $table->string('promo')->nullable();
            $table->foreignId('domaine_id')->constrained('domaines')->onDelete('cascade'); // Lien vers domaines
            $table->string('nom');
            $table->text('description');
            $table->integer('cout');
            $table->integer('heures_par_semaine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations');
    }
};
