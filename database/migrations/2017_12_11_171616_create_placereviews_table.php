<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacereviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placereviews', function (Blueprint $table) {
            $table->increments('placereview_id');
            $table->string('placereview_detail');
            $table->string('placereview_star');
            $table->string('placereview_status');
            $table->string('placereview_photo');

            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')
                ->references('place_id')
                ->on('places')
                ->onDelete('cascade');

            $table->integer('placereview_by')->unsigned();
            $table->foreign('placereview_by')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('placereviews');
    }
}
