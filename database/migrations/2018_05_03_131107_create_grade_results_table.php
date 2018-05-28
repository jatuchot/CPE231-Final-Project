<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('grade_results', function (Blueprint $table) {
            $table->increments('graderesultid');
	    $table->string('student_id')->nullable()->default(NULL);
            $table->foreign('student_id')->unique()->references('student_id')->on('student_info');
	    $table->integer('enrollid')->unsigned()->nullable()->default(NULL);
            $table->foreign('enrollid')->unique()->references('enrollid')->on('enrollments');
	    $table->string('grade','2');
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
        Schema::dropIfExists('grade_results');
	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
