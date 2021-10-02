<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->longText('item_name');
            $table->text('item_type');
            $table->bigInteger('ninjutsu');
            $table->bigInteger('taijutsu');
            $table->bigInteger('genjutsu');
            $table->bigInteger('price');
            $table->text('currency');
            $table->longText('clan');
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
        Schema::dropIfExists('items');
    }
}
