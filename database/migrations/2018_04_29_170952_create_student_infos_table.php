<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_info', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id')->unsigned()->nullable()->default(NULL);
	    $table->foreign('user_id')->unique()->references('id')->on('users');
	    $table->string('Identification_Number');
	    $table->string('Firstname');
	    $table->string('Lastname');
	    $table->string('FirstnameTH');
	    $table->string('LastnameTH');
	    $table->string('gender',1);
	    $table->string('address',555);
	    $table->string('phone_num', 20);
	    $table->string('Personal_Email');
	    $table->string('Kmutt_Email');
	    $table->date('DOB');
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
        Schema::dropIfExists('student_info');
    }
}
