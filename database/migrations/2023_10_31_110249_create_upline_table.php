<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUplineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_upline', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upline_id');
            $table->string('outlet_id');
            $table->foreign('outlet_id')->references('id_outlet')->on('outlet');
            $table->foreign('upline_id')->references('id')->on('master_upline');
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
        Schema::dropIfExists('list_upline');
    }
}
