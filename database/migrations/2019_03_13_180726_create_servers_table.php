<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('customer');
            $table->string('ip_address');
            $table->string('cpanel_url')->nullable(true);
            $table->string('cpanel_username')->nullable(true);
            $table->string('cpanel_password')->nullable(true);
            $table->string('rdp_port')->nullable(true);
            $table->string('rdp_user')->nullable(true);
            $table->string('rdp_password')->nullable(true);
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
        Schema::drop('servers');
    }
}
