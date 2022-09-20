<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_season');
            $table->unsignedBigInteger('id_disciplina');
            $table->unsignedBigInteger('id_room');
            $table->string('name');
            $table->string('código');
            $table->boolean('active');
            $table->timestamps();
            $table->foreign('id_season')->references('id')->on('seasons');
            $table->foreign('id_disciplina')->references('id')->on('disciplines');
            $table->foreign('id_room')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('classes');
    }
}
