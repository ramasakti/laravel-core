<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatOutletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_outlet', function (Blueprint $table) {
            $table->string('outlet_id')->primary();
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->unsignedBigInteger('lokasi_id')->nullable();
            $table->string('lat_long')->nullable();
            $table->text('link_map')->nullable();
            $table->text('foto');
            $table->unsignedBigInteger('luas_outlet')->nullable();
            $table->unsignedBigInteger('bangunan_outlet')->nullable();
            $table->foreign('outlet_id')->references('id_outlet')->on('outlet');
            $table->foreign('lokasi_id')->references('id')->on('master_lokasi');
            $table->foreign('luas_outlet')->references('id')->on('master_luas');
            $table->foreign('bangunan_outlet')->references('id')->on('master_bangunan');
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
        Schema::dropIfExists('alamat_outlet');
    }
}
