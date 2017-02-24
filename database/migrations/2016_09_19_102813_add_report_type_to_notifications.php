<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReportTypeToNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // We are using here raw database statements because Laravel doesn't fully support enum modification.
        DB::statement("ALTER TABLE notifications MODIFY type ENUM('post', 'rating', 'comment', 'reply', 'subscriber', 'report')");
        DB::statement("ALTER TABLE notifications MODIFY action ENUM('create', 'edit', 'delete', 'accept', 'deny')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // We are using here raw database statements because Laravel doesn't fully support enum modification.
        DB::statement("ALTER TABLE notifications MODIFY type ENUM('post', 'rating', 'comment', 'reply', 'subscriber')");
        DB::statement("ALTER TABLE notifications MODIFY action ENUM('create', 'edit', 'delete')");
    }
}
