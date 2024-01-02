<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_question', function (Blueprint $table) {
            $table->id();
            $table->string('component');
            $table->string('label');
            $table->boolean('active');
            $table->unsignedBigInteger('step_id');
            $table->foreign('step_id')->references('id')->on('master_step');
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
        Schema::dropIfExists('master_question');
    }
}
