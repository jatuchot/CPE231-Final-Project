<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('user_id')->unique()->references('id')->on('student_info');
	    $table->integer('act_id')->unsigned()->nullable()->default(NULL);
	    $table->foreign('act_id')->unique()->references('id')->on('activities_info');
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
        Schema::dropIfExists('activities');
    }
}
