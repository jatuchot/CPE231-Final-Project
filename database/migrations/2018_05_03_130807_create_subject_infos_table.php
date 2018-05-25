<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_info', function (Blueprint $table) {
	    $table->increments('id');
            $table->string('subject_id');
	    $table->string('subject_name');
	    $table->integer('credit');
	    $table->integer('foryear');
	    $table->string('day');
	    $table->time('start_from');
	    $table->time('end_at');
	    $table->string('roomid');
	    $table->string('instructor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_info');
    }
}
