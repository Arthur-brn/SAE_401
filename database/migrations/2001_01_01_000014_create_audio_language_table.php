<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_language', function (Blueprint $table) {
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('language_id');

            $table->primary(['film_id', 'language_id']);

            $table->foreign('film_id')->references('id')->on('film');
            $table->foreign('language_id')->references('id')->on('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio_language');
    }
}
