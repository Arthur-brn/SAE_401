<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class CreateNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id')->nullable();
            $table->unsignedBigInteger('film_id')->nullable();
            $table->text('notice_content');
            $table->unsignedTinyInteger('notice_mark');
            $table->date('post_date')->default(Carbon::now());
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
        Schema::dropIfExists('book_notice');
    }
}
