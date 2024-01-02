<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMerkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_merk', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('sub_merk');
            $table->unsignedBigInteger('jenis_produk_id');
            $table->boolean('active');
            $table->foreign('jenis_produk_id')->references('id')->on('master_jenis_produk');
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
        Schema::dropIfExists('master_merk');
    }
}
