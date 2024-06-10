<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->morphs('reviewable');
            $table->unsignedBigInteger('user_id');
            $table->text('review_content');
            $table->unsignedTinyInteger('review_mark');
            $table->date('post_date')->default(Carbon::now());
            $table->timestamps();

            $table->primary(['user_id', 'reviewable_id', 'reviewable_type']);

            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
}
