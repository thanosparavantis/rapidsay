<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnDeleteOnSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function ($table) {
            $table->dropForeign('subscriptions_subscriber_id_foreign');
            $table->foreign('subscriber_id')->references('id')->on('users')->onDelete('cascade');
            $table->dropForeign('subscriptions_subscription_id_foreign');
            $table->foreign('subscription_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function ($table) {
            $table->dropForeign('subscriptions_subscriber_id_foreign');
            $table->foreign('subscriber_id')->references('id')->on('users');
            $table->dropForeign('subscriptions_subscription_id_foreign');
            $table->foreign('subscription_id')->references('id')->on('users');
        });
    }
}
