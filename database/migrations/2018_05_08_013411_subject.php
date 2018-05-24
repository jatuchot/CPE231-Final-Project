<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('subject', function (Blueprint $table) {
            $table->string('subject_id')->nullable()->default(NULL);
            $table->foreign('subject_id')->unique()->references('subject_id')->on('subject_info');
	    $table->integer('date_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('date_id')->unique()->references('id')->on('subject_dates');

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
