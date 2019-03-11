<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacephotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placephotos', function (Blueprint $table) {
            $table->increments('placephoto_id');
            $table->longText('placephoto_path');
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
        Schema::dropIfExists('placephotos');
    }
}
