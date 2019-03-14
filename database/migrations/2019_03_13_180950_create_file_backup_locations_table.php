<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFileBackupLocationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_backup_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('datastore_location');
            $table->string('path');
            $table->longText('exclusions')->nullable(true);
            $table->integer('full_backup_date')->nullable(true);
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
        Schema::drop('file_backup_locations');
    }
}
