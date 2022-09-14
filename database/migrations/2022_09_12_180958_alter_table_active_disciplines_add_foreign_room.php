<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableActiveDisciplinesAddForeignRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('active_discplines', function (Blueprint $table) {
            $table->unsignedBigInteger('idroom');
            $table->foreign('idroom')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('active_discplines', function ($table) {
            $table->dropForeign('idroom_foreign');
        });
    }
}
