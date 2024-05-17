<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id')->nullable();
            $table->unsignedBigInteger('film_id')->nullable();
            $table->date('start_date');
            $table->enum('status', ['pending', 'reserved', 'returned']);
            $table->timestamps();

            $table->primary(['user_id', 'book_id', 'film_id']);

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('book_id')->references('id')->on('book');
            $table->foreign('film_id')->references('id')->on('film');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan');
    }
}
