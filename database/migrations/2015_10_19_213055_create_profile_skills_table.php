<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileSkillsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('profile_skills', function (Blueprint $table){
      $table->integer('profile_id')->unsigned();
      $table->integer('skill_id')->unsigned();
      $table->integer('level');

      $table->foreign('profile_id')->references('id')->on('profiles');
      $table->foreign('skill_id')->references('id')->on('skills');
      
      //$table->primary(['profile_id', 'skill_id']);
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('profile_skills');
  }
}
