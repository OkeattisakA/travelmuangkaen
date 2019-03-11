<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisdomphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisdomphotos', function (Blueprint $table) {
            $table->increments('wisdomphoto_id');
            $table->longText('wisdomphoto_path');
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
        Schema::dropIfExists('wisdomphotos');
    }
}
