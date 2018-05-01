<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityInfosTable extends Migration
{
    public function up()
    {
        Schema::create('activities_info', function (Blueprint $table){
            $table->increments('id');
            $table->string('activitiesName');
            $table->string('participant');
            $table->string('presidentID');
            $table->date('startFrom');
            $table->date('endAt');
            $table->string('presidentAct');
            $table->string('amountHours');
            $table->string('advisor');
            $table->string('status')->nullable()->default(0);
            $table->string('PDF_filename')->nullable()->default("NULL");
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
        Schema::dropIfExists('activities_info');
    }
}
