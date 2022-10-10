<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFinalScoreColumnIntoRegistrationsInClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations_in_classes', function (Blueprint $table) {
            $table->float('final_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations_in_classes', function (Blueprint $table) {
            $table->dropColumn('final_score');
        });
    }
}
