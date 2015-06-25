<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->timestamp('registered_at');
            $table->boolean('has_paid');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['event_id', 'email']);
            $table->foreign('event_id')
                  ->references('id')->on('events')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('registrations');
    }
}
