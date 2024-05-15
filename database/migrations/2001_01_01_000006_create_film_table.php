<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('picture', 50);
            $table->unsignedBigInteger('director_id');
            $table->enum('style', ['fantastique', 'romantique', 'science-fiction', 'policier', 'aventure', 'historique', 'horreur', 'humoristique', 'fantasy épique', 'drame', 'thriller', 'mystère', 'biographie', 'autobiographie', 'essai', 'poésie', 'conte de fées', 'nouvelle', 'roman graphique']);
            $table->integer('age_limit');
            $table->text('summary');
            $table->integer('duration');
            $table->integer('year');
            $table->unsignedTinyInteger('copy_number');
            $table->unsignedInteger('loan_number');

            $table->foreign('director_id')->references('id')->on('director');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film');
    }
}
