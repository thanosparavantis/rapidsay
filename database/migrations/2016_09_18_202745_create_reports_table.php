<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reporter_id')->unsigned();
            $table->foreign('reporter_id')->references('id')->on('users');
            $table->text('description');
            $table->integer('reportable_id');
            $table->string('reportable_type');
            $table->enum('status', ['pending', 'accepted', 'denied'])->default('pending');
            $table->enum('action', ['edit', 'delete'])->nullable();
            $table->string('deleted_data')->nullable();
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
        Schema::drop('reports');
    }
}
