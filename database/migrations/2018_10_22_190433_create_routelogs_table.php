<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routelogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origin');
            $table->string('destination');
            $table->string('distance');
            $table->string('duration');
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
        Schema::dropIfExists('routelogs');
    }
}
