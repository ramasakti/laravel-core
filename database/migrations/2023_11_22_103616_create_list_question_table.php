<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_question', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_outlet');
            $table->unsignedBigInteger('question_id');
            $table->boolean('required');
            $table->foreign('jenis_outlet')->references('id')->on('master_jenis_outlet');
            $table->foreign('question_id')->references('id')->on('master_question');
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
        Schema::dropIfExists('list_question');
    }
}
