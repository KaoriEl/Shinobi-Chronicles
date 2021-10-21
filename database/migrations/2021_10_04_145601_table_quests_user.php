<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableQuestsUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_user_quests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quests_id')->unsigned();
            $table->foreign('quests_id')->references('id')->on('quests');
            $table->bigInteger('shinobi_id')->unsigned();
            $table->foreign('shinobi_id')->references('id')->on('shinobi_users');
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
        Schema::dropIfExists('pivot_user_quests');
    }
}
