<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_langage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('FilmId');
            $table->foreign('FilmId')->references('id')->on('film');
            $table->unsignedBigInteger('LangageId');
            $table->foreign('LangageId')->references('id')->on('langage');
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
        Schema::dropIfExists('film_langage');
    }
}
