<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_info', function (Blueprint $table) {
            $table->increments('id');
	    $table->string('Cert_level');
	    $table->string('schoolname');
            $table->integer('user_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('user_id')->unique()->references('id')->on('student_info');
	    $table->string('GPAX');
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
        Schema::dropIfExists('school_info');
    }
}
