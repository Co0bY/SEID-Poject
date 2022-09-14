<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_active_discpline');
            $table->string('day_of_the_week');
            $table->string('start_time');
            $table->string('end_time');
            $table->timestamps();
            $table->foreign('id_active_discpline')->references('id')->on('active_discplines');
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
            $table->dropForeign('id_active_discpline_foreign');
        });
        Schema::dropIfExists('schedules');
    }
}
