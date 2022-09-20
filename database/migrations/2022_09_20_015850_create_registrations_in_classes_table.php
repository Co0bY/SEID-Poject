<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsInClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations_in_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_student');
            $table->unsignedBigInteger('id_class');
            $table->timestamps();
            $table->foreign('id_student')->references('id')->on('students');
            $table->foreign('id_class')->references('id')->on('classes');
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
        Schema::dropIfExists('registrations_in_classes');
    }
}
