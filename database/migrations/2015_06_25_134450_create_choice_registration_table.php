<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChoiceRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choice_registration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('choice_id')->unsigned();
            $table->integer('registration_id')->unsigned();

            $table->foreign('choice_id')
                  ->references('id')->on('choices')
                  ->onDelete('cascade');

            $table->foreign('registration_id')
                  ->references('id')->on('registrations')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('choice_registration');
    }
}
