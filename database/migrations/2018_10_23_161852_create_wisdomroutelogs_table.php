<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisdomroutelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisdomroutelogs', function (Blueprint $table) {
            $table->increments('wisdomroute_id');
            $table->string('wisdom_origin');
            $table->string('wisdom_destination');
            $table->string('wisdom_distance');
            $table->string('wisdom_duration');
            $table->integer('wisdom_id')->unsigned();
            $table->foreign('wisdom_id')
                ->references('wisdom_id')
                ->on('wisdoms')
                ->onDelete('cascade');
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
        Schema::dropIfExists('wisdomroutelogs');
    }
}
