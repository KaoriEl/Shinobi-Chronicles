<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableEnemys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enemys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('ninjutsu');
            $table->bigInteger('taijutsu');
            $table->bigInteger('genjutsu');
            $table->bigInteger('reward_money')->default("0");
            $table->bigInteger('drop_chance')->default("0");
            $table->string('status')->default("inactive");
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
        Schema::dropIfExists('enemys');
    }
}
