<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsInActiveDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations_in_active_disciplines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_registration');
            $table->unsignedBigInteger('id_active_discpline');
            $table->foreign('id_registration')->references('id')->on('disciplines');
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
            $table->dropForeign('id_registration_foreign');
            $table->dropForeign('id_active_discpline_foreign');
        });
        Schema::dropIfExists('registrations_in_active_disciplines');
    }
}
