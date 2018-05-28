<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_history', function (Blueprint $table) {
	    $table->increments('id');
	    $table->string('student_id')->nullable()->default(NULL);
            $table->foreign('student_id')->unique()->references('student_id')->on('student_info');
	    $table->string('phy10');
	    $table->string('phy11');
	    $table->string('phy12');
	    $table->string('math10');
            $table->string('math11');
            $table->string('math12');
	    $table->string('mic10');
            $table->string('mic11');
            $table->string('mic12');
	    $table->string('chm10');
            $table->string('chm11');
            $table->string('chm12');
	    $table->string('eng10');
            $table->string('eng11');
            $table->string('eng12');
	    $table->string('GPAXeng');
	    $table->string('GPAXmth');
	    $table->string('GPAXphy');
	    $table->string('GPAXmic');
	    $table->string('GPAXchm');
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
        Schema::dropIfExists('academic_history');
    }
}
