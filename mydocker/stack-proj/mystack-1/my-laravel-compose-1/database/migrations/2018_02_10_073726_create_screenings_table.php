<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenings', function (Blueprint $table) {
          $table->increments('id');
          $table->datetime('date')->nullable(false);
          $table->string('fk_ic')->nullable();
          $table->foreign('fk_ic')->references('ic')->on('kospenusers')->onDelete('cascade');
          $table->integer('weight');
          $table->integer('height');
          $table->integer('systolic');
          $table->integer('diastolic');
          $table->integer('dxt');
          $table->boolean('smoker');
          $table->boolean('sendToServer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screenings');
    }
}
