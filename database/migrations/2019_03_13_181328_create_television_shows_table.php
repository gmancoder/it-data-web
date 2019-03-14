<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelevisionShowsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('television_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('banner_filename')->nullable(true);
            $table->enum('backup', ['Yes','No'])->default('No');
            $table->string('backup_location')->nullable(true);
            $table->string('dyn_id')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('television_shows');
    }
}
