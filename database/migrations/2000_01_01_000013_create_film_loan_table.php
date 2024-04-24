<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class CreateFilmLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_loan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserId');
            $table->foreign('UserId')->references('id')->on('user');
            $table->unsignedBigInteger('FilmId');
            $table->foreign('FilmId')->references('id')->on('film');
            $table->date('LoanDate')->default(Carbon::now()->toDateString());
            $table->date('ReturnDate')->default(Carbon::now()->addDays(7)->toDateString());
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
        Schema::dropIfExists('film_loan');
    }
}
