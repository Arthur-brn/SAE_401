<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('actor');
            $table->unsignedBigInteger('film_id');
            $table->foreign('film_id')->references('id')->on('film');
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
        Schema::dropIfExists('casting');
    }
}
