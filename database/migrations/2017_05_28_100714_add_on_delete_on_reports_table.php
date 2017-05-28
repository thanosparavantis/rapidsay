<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnDeleteOnReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function ($table) {
            $table->dropForeign('reports_reporter_id_foreign');
            $table->foreign('reporter_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function ($table) {
            $table->dropForeign('reports_reporter_id_foreign');
            $table->foreign('reporter_id')->references('id')->on('users');
        });
    }
}
