<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReputationToNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE notifications MODIFY type ENUM('post', 'rating', 'comment', 'reply', 'subscriber', 'report', 'reputation')");
        DB::statement("ALTER TABLE notifications MODIFY action ENUM('create', 'edit', 'delete', 'accept', 'deny', 'increase', 'decrease')");

        Schema::table('notifications', function ($table) {
            $table->text('data')->after('to_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE notifications MODIFY type ENUM('post', 'rating', 'comment', 'reply', 'subscriber', 'report')");
        DB::statement("ALTER TABLE notifications MODIFY action ENUM('create', 'edit', 'delete', 'accept', 'deny')");

        Schema::table('notifications', function ($table) {
            $table->dropColumn('data');
        });
    }
}
