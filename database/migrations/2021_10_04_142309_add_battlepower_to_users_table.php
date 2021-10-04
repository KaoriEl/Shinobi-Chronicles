<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBattlepowerToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shinobi_users', function (Blueprint $table) {
            $table->bigInteger('battle_power')->default(0)->after('genjutsu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shinobi_users', function (Blueprint $table) {
            $table->dropColumn('battle_power');
        });
    }
}
