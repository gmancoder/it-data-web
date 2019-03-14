<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWebsitesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('owning_account')->nullable(true);
            $table->enum('display_in_portal', ['Yes','No'])->default('No');
            $table->integer('category_id')->unsigned();
            $table->string('internal_url')->nullable(true);
            $table->string('external_url');
            $table->string('admin_url')->nullable(true);
            $table->string('admin_username')->nullable(true);
            $table->string('admin_password')->nullable(true);
            $table->enum('status', ['Active','Inactive'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('website_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('websites');
    }
}
