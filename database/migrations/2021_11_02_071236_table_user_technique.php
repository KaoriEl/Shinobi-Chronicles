<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableUserTechnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_technique', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shinobi_id')->unsigned();
            $table->foreign('shinobi_id')->references('id')->on('shinobi_users');
            $table->bigInteger('technique_id')->unsigned();
            $table->foreign('technique_id')->references('id')->on('technicians');
            $table->bigInteger('studied');
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
        Schema::dropIfExists('user_technique');
    }
}
