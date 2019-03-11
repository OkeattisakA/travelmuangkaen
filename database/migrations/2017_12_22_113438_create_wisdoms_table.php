<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisdomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisdoms', function (Blueprint $table) {
            $table->increments('wisdom_id');
            $table->string('wisdom_name_th');
            $table->string('wisdom_name_eng');
            $table->string('wisdom_address');
            $table->longText('wisdom_detail');
            $table->string('wisdom_lat');
            $table->string('wisdom_lng');
            $table->string('wisdom_cover');
            $table->string('wisdom_tagline');
//            $table->string('wisdom_tag');
            $table->integer('wisdom_publishby')->unsigned();
            $table->foreign('wisdom_publishby')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('wisdom_status');
            $table->integer('wisdom_reader')->default(0);
            $table->integer('wisdom_search')->default(0);
            $table->integer('wisdom_switch')->default(0);
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
        Schema::dropIfExists('wisdoms');
    }
}
