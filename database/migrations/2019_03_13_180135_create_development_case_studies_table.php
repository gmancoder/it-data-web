<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevelopmentCaseStudiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('development_case_studies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('developed_for')->nullable(true);
            $table->integer('year');
            $table->enum('developed_language', ['C#','PHP','Python','Ruby','Java','Node.JS'])->nullable(true);
            $table->enum('database_platform', ['MongoDB','MySQl','Oracle','PostgreSQL','SQLServer'])->nullable(true);
            $table->integer('lanugage_category_id')->unsigned();
            $table->longText('summary')->nullable(true);
            $table->integer('display_order')->default(1);
            $table->enum('private', ['Yes','No'])->default('No');
            $table->string('github_repo_url')->nullable(true);
            $table->string('thumbnail_url')->nullable(true);
            $table->string('dyn_id')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('lanugage_category_id')->references('id')->on('language_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('development_case_studies');
    }
}
