<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('first_name')->index();
            $table->string('last_name')->index();
            $table->string('name_complete')->index();
            $table->string('email_one');
            $table->string('email_two');
            $table->string('tel_one');
            $table->string('tel_two');
            $table->enum('type',['externo','interno'])->default('interno');
            $table->timestamps();
        });

        Schema::create('contributor_project', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('contributor_id')->unsigned();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('contributor_id')->references('id')->on('contributors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('contributor_project');
       Schema::drop('contributors');
    }
}
