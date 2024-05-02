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
            $table->string('picture', 50);
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('editor_id');
            $table->string('style', 50);
            $table->string('type', 50);
            $table->text('summary');
            $table->unsignedInteger('page_number');
            $table->unsignedInteger('edition_year');
            $table->boolean('is_booked')->default(false);
            $table->boolean('is_borrowed')->default(false);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('author');
            $table->foreign('editor_id')->references('id')->on('editor');
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
