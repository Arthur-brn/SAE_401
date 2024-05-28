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
            $table->morphs('loanable');
            $table->unsignedBigInteger('user_id');
            $table->string('booking_number', 10);
            $table->date('start_date');
            $table->enum('status', ['booked', 'loaned', 'returned']);
            $table->timestamps();

            $table->primary(['user_id', 'loanable_id', 'loanable_type']);

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
        Schema::dropIfExists('loan');
    }
}