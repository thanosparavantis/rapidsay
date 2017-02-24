<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserPrivacySettingsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->boolean('show_email')->after('remember_token')->default(false);
            $table->boolean('show_ratings')->after('show_email')->default(false);
            $table->boolean('show_online')->after('show_ratings')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('show_email');
            $table->dropColumn('show_ratings');
            $table->dropColumn('show_online');
        });
    }
}
