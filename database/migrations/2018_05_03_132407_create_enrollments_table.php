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
        Schema::create('enrollments', function (Blueprint $table) {
	    $table->increments('enrollid');
            $table->string('studentid');
	    $table->string('subjectid');
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
