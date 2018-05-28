<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('enrollments', function (Blueprint $table) {
	    $table->increments('enrollid');
            $table->string('studentid')->nullable()->default(NULL);
	    $table->foreign('studentid')->unique()->references('student_id')->on('student_info');
	    $table->integer('subjectid')->unsigned()->nullable()->default(NULL);
	    $table->foreign('subjectid')->unique()->references('id')->on('subject_info');
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
	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('enrollments');
	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
