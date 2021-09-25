<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableShinobiUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shinobi_users', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->text('step');
            $table->bigInteger('clan_id')->unsigned();
            $table->foreign('clan_id')->references('id')->on('clans');
            $table->bigInteger('village_id')->unsigned();
            $table->foreign('village_id')->references('id')->on('villages');
            $table->bigInteger('ninjutsu');
            $table->bigInteger('taijutsu');
            $table->bigInteger('genjutsu');
            $table->bigInteger('money')->default("0");
            $table->bigInteger('energy')->default("100");
            $table->text('role');
            $table->bigInteger('peer_id')->unique();
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
        Schema::dropIfExists('shinobi_users');
    }
}
