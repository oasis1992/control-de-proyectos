<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cap_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('chapter_title');
            $table->string('authors');
            $table->string('coordinators');
            $table->integer('age');
            $table->string('isbn');
            $table->string('editorial');
            $table->string('edition');
            $table->string('ca');

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::drop('cap_books');
    }
}