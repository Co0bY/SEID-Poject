<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinesInActiveDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines_in_active_disciplines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_discipline');
            $table->unsignedBigInteger('id_active_discpline');
            $table->foreign('id_discipline')->references('id')->on('disciplines');
            $table->foreign('id_active_discpline')->references('id')->on('active_discplines');
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
        Schema::table('registrations', function ($table) {
            $table->dropForeign('id_discipline_foreign');
            $table->dropForeign('id_active_discpline_foreign');
        });
        Schema::dropIfExists('disciplines_in_active_disciplines');
    }
}
