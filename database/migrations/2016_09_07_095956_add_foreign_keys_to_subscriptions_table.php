<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function ($table) {
            $table->integer('subscriber_id')->unsigned()->change();
            $table->foreign('subscriber_id')->references('id')->on('users');
            $table->integer('subscription_id')->unsigned()->change();
            $table->foreign('subscription_id')->references('id')->on('users');
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
            $table->dropForeign('subscriptions_subscription_id_foreign');
        });
    }
}
