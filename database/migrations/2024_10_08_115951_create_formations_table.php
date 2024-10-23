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
            $table->id();
            $table->unsignedBigInteger('domaine_id'); // Assurez-vous qu'il est unsigned
            $table->string('promo')->nullable();
            $table->string('nom');
            $table->text('description');
            $table->integer('cout');
            $table->integer('heures_par_semaine');
            $table->timestamps();

            // Déclaration de la clé étrangère
            $table->foreign('domaine_id')->references('id')->on('domaines')->onDelete('cascade');
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
