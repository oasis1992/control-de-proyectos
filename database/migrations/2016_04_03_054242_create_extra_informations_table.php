<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post');
            $table->string('level');
            $table->string('index');
            $table->string('sni');
            $table->integer('contributor_id')->unsigned();

            $table->foreign('contributor_id')->references('id')->on('contributors')->onDelete('cascade');
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
        Schema::drop('extra_informations');
    }
}
