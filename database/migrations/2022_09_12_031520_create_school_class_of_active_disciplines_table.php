<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassOfActiveDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_class_of_active_disciplines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_schoolclass');
            $table->unsignedBigInteger('id_active_discpline');
            $table->foreign('id_schoolclass')->references('id')->on('disciplines');
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
            $table->dropForeign('id_schoolclass_foreign');
            $table->dropForeign('id_active_discpline_foreign');
        });
        Schema::dropIfExists('school_class_of_active_disciplines');
    }
}
