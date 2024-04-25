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
            $table->string('name');
            $table->integer('duration');
            $table->string('director');
            $table->integer('year');
            $table->integer('age_limit');
            $table->text('summary');
            $table->integer('loan_number');
            $table->boolean('is_booked')->default(false);
            $table->boolean('is_borrowed')->default(false);
            $table->string('picture')->nullable();
            $table->integer('copy_number');
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
