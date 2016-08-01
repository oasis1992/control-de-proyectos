<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoryExtendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memory_extend', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('authors');
            $table->string('name_congress');
            $table->enum('type', ['national', 'international']);
            $table->string('place_congress');
            $table->date('date_congress');
            $table->string('institution');
            $table->string('isbn');
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
        Schema::drop('memory_extend');
    }
}
