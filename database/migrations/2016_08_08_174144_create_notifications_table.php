<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['post', 'rating', 'comment', 'reply', 'subscriber']);
            $table->integer('type_id')->nullable();
            $table->enum('action', ['create', 'edit', 'delete']);
            $table->integer('from_id')->nullable();
            $table->integer('to_id');
            $table->string('deleted_data')->nullable();
            $table->boolean('seen');
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
        Schema::drop('notifications');
    }
}
