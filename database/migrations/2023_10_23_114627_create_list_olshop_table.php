<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOlshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_olshop', function (Blueprint $table) {
            $table->id();
            $table->string('outlet_id');
            $table->unsignedBigInteger('olshop_id');
            $table->foreign('outlet_id')->references('id_outlet')->on('outlet');
            $table->foreign('olshop_id')->references('id')->on('master_olshop');
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
        Schema::dropIfExists('list_olshop');
    }
}
