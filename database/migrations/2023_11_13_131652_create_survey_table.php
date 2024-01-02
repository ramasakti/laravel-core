<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->id();
            $table->string('id_outlet');
            $table->string('pengelola');
            $table->string('hp_pemilik');
            $table->string('hp_pengelola');
            $table->json('alamat');
            $table->unsignedBigInteger('kategori_id');
            $table->json('upline');
            $table->json('produk');
            $table->json('olshop');
            $table->json('material_promo');
            $table->unsignedBigInteger('bangunan_id');
            $table->unsignedBigInteger('lokasi_id');
            $table->string('lat_long');
            $table->string('link_maps');
            $table->text('foto');
            $table->string('status_toko');
            $table->unsignedBigInteger('luas_outlet')->nullable();
            $table->boolean('verified');
            $table->date('tanggal_survey');
            $table->string('created_by');
            $table->dateTime('verified_at')->nullable();
            $table->string('verified_by')->nullable();
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
        Schema::dropIfExists('survey');
    }
}
