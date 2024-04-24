<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_langage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('BookId');
            $table->foreign('BookId')->references('id')->on('book');
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
        Schema::dropIfExists('book_langage');
    }
}
