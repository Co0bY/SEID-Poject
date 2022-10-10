<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_in_class_id');
            $table->string('title',255);
            $table->string('content', 255);
            $table->string('additional_file');
            $table->float('score')->default(null);
            $table->boolean('revised')->default(null);
            $table->string('answer');
            $table->string('answer_file');
            $table->timestamps();
            $table->foreign('registration_in_class_id')->references('id')->on('registrations_in_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homework_answers');
    }
}
