<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('BookTitle', 50);
            $table->unsignedBigInteger('AuthorId');
            $table->foreign('AuthorId')->references('id')->on('author');
            $table->string('BookEditor', 50);
            $table->string('BookStyle', 50);
            $table->integer('BookPageNumber');
            $table->integer('BookEditionDate');
            $table->integer('BookLoanNumber');
            $table->string('BookType', 50);
            $table->text('BookSummary');
            $table->tinyInteger('IsBooked');
            $table->tinyInteger('IsBorrowed');
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
        Schema::dropIfExists('book');
    }
}
