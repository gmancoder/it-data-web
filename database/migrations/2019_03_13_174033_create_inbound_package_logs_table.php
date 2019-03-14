<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInboundPackageLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbound_package_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->integer('inbound_package_id')->unsigned();
            $table->dateTime('created_in_dyn')->nullable(true);
            $table->longText('notetext');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('inbound_package_id')->references('id')->on('inbound_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inbound_package_logs');
    }
}
