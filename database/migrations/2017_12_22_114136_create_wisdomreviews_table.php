<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisdomreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisdomreviews', function (Blueprint $table) {
            $table->increments('wisdomreview_id');
            $table->string('wisdomreview_detail');
            $table->string('wisdomreview_star');
            $table->string('wisdomreview_status');
            $table->string('wisdomreview_photo');

            $table->integer('wisdom_id')->unsigned();
            $table->foreign('wisdom_id')
                ->references('wisdom_id')
                ->on('wisdoms')
                ->onDelete('cascade');

            $table->integer('wisdomreview_by')->unsigned();
            $table->foreign('wisdomreview_by')
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
        Schema::dropIfExists('wisdomreviews');
    }
}
