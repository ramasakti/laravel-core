<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlet', function (Blueprint $table) {
            $table->string('id_outlet')->primary();
            $table->string('nama_outlet');
            $table->string('pemilik');
            $table->string('pengelola');
            $table->string('no_telp')->default('');
            $table->string('hp_pemilik');
            $table->string('hp_pengelola');
            $table->string('npwp')->default('');
            $table->string('jurnal_id')->default('');
            $table->string('status_toko');
            $table->integer('jenis_outlet_id');
            $table->integer('tipe_outlet_id');
            $table->integer('tipe_pembelian_id')->nullable();
            $table->integer('kategori_outlet_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('status_data');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('outlet');
    }
}
