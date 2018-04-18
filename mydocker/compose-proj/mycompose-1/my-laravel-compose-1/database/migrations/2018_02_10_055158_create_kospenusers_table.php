<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKospenusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kospenusers', function (Blueprint $table) {
          $table->timestamps();
          $table->string('ic');
          $table->primary('ic');
          $table->string('name');

          $table->integer('fk_gender')->unsigned();
          $table->foreign('fk_gender')->references('id')->on('genders')->onDelete('cascade');

          $table->string('address');
          $table->string('firstRegRegion');

          $table->integer('fk_state')->unsigned();
          $table->foreign('fk_state')->references('id')->on('states')->onDelete('cascade');

          $table->integer('fk_region')->unsigned();
          $table->foreign('fk_region')->references('id')->on('regions')->onDelete('cascade');

          $table->integer('fk_subregion')->unsigned();
          $table->foreign('fk_subregion')->references('id')->on('subregions')->onDelete('cascade');

          $table->integer('fk_locality')->unsigned();
          $table->foreign('fk_locality')->references('id')->on('localities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kospenusers');
    }
}
