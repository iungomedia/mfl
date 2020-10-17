<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('games', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('id_team_1')->unsigned();
      $table->integer('id_team_2')->unsigned();
      $table->integer('result_1')->unsigned();
      $table->integer('result_2')->unsigned();
      $table->integer('id_category')->unsigned();
      $table->integer('id_journey')->unsigned();
      $table->datetime('date');
      $table
        ->tinyInteger('played')
        ->unsigned()
        ->default(0);
      $table->timestamps();

      //Relation
      $table
        ->foreign('id_team_1')
        ->references('id')
        ->on('teams')
        ->onDelete('set null')
        ->onUpdate('set null');

      $table
        ->foreign('id_team_2')
        ->references('id')
        ->on('teams')
        ->onDelete('set null')
        ->onUpdate('set null');

      $table
        ->foreign('id_category')
        ->references('id')
        ->on('category')
        ->onDelete('set null')
        ->onUpdate('set null');

      $table
        ->foreign('id_journey')
        ->references('id')
        ->on('journeys')
        ->onDelete('set null')
        ->onUpdate('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('games');
  }
}
