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
	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

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
	    $table->integer('instructor')->unsigned()->nullable()->default(NULL);
            $table->foreign('instructor')->unique()->references('id')->on('teacher_info');  
	    $table->string('section');
	    $table->string('term');
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
        Schema::dropIfExists('subject_info');
    }
}
