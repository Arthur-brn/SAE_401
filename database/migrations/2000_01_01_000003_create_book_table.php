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
            $table->string('title', 50);
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('author');
            $table->string('editor', 50);
            $table->string('style', 50);
            $table->integer('page_number');
            $table->date('edition_date');
            $table->integer('loan_number');
            $table->string('type', 50);
            $table->text('summary');
            $table->tinyInteger('is_booked')->default(false);
            $table->tinyInteger('is_borrowed')->default(false);
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
