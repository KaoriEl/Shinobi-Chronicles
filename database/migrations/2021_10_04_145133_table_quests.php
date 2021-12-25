<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableQuests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->longText('quests_name');
            $table->bigInteger('ninjutsu');
            $table->bigInteger('taijutsu');
            $table->bigInteger('genjutsu');
            $table->bigInteger('reward_money');
            $table->bigInteger('min_bm')->default(300);
            $table->string('status')->default("active");
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
        Schema::dropIfExists('quests');
    }
}
