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
	    $table->string('student_id',11)->unique();
	    $table->string('Identification_Number');
	    $table->string('Firstname',32);
	    $table->string('Lastname',32);
	    $table->string('FirstnameTH',32);
	    $table->string('LastnameTH',32);
	    $table->string('gender',1);
	    $table->string('address',555);
	    $table->string('phone_num', 20);
	    $table->string('Personal_Email',64);
	    $table->string('Kmutt_Email',64);
	    $table->date('DOB');
	    $table->string('image_filename')->nullable();
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
