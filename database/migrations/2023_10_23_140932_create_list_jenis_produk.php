<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListJenisProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_jenis_produk', function (Blueprint $table) {
            $table->id();
            $table->string('outlet_id');
            $table->unsignedBigInteger('jenis_produk_id');
            $table->unsignedBigInteger('merk_id');
            $table->foreign('outlet_id')->references('id_outlet')->on('outlet');
            $table->foreign('jenis_produk_id')->references('id')->on('master_jenis_produk');
            $table->foreign('merk_id')->references('id')->on('master_merk');
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
        Schema::dropIfExists('list_jenis_produk');
    }
}
