<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_dates', function (Blueprint $table) {
	    $table->increments('id');
	    $table->string('day');
	    $table->time('start_from');
	    $table->time('end_at');
	    $table->integer('foryear');
	    $table->string('instructor');
	    $table->string('roomid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_dates');
    }
}
