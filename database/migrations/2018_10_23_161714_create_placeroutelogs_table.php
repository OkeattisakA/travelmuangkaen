<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceroutelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placeroutelogs', function (Blueprint $table) {
            $table->increments('placeroute_id');
            $table->string('place_origin');
            $table->string('place_destination');
            $table->string('place_distance');
            $table->string('place_duration');
            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')
                ->references('place_id')
                ->on('places')
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
        Schema::dropIfExists('placeroutelogs');
    }
}
