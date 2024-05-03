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
            $table->string('style', 50);
            $table->integer('age_limit');
            $table->text('summary');
            $table->integer('duration');
            $table->integer('year');
            $table->unsignedTinyInteger('copy_number');
            $table->timestamps();

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
