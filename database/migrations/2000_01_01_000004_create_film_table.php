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
            $table->string('FilmName');
            $table->integer('FilmDuration');
            $table->string('FilmDirector');
            $table->integer('FilmYear');
            $table->integer('FilmAgeLimit');
            $table->text('FilmSummary');
            $table->integer('FilmLoanNumber');
            $table->boolean('IsBooked')->default(false);
            $table->boolean('IsBorrowed')->default(false);
            $table->string('FilmPicture')->nullable();
            $table->integer('CopyNumber');
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
        Schema::dropIfExists('film');
    }
}
