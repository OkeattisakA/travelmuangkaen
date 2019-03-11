<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('place_id');
            $table->string('place_name_th');
            $table->string('place_name_eng');
            $table->string('place_address');
            $table->longText('place_detail');
            $table->string('place_lat');
            $table->string('place_lng');
            $table->string('place_cover');
            $table->string('place_tagline');
//            $table->string('place_tag');
            $table->integer('place_publishby')->unsigned();
            $table->foreign('place_publishby')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('place_status');
            $table->integer('place_reader')->default(0);
            $table->integer('place_search')->default(0);
            $table->integer('place_switch')->default(0);
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
        Schema::dropIfExists('places');
    }
}
