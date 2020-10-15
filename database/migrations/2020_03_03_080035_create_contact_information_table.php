<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manager');
            $table->string('address');
            $table->bigInteger('phone_number_1')->unsigned();
            $table->bigInteger('phone_number_2')->unsigned();
            $table->bigInteger('phone_number_3')->unsigned();
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('web');
            $table->string('maps');
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
        Schema::dropIfExists('contact_information');
    }
}
