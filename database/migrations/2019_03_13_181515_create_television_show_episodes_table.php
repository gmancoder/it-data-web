<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelevisionShowEpisodesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('television_show_episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('tv_show_id')->unsigned();
            $table->string('season_number');
            $table->string('episode_number');
            $table->string('dyn_id')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tv_show_id')->references('id')->on('television_shows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('television_show_episodes');
    }
}
