<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogHistoryOutletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_history_outlet', function (Blueprint $table) {
            $table->id();
            $table->string('nama_outlet');
            $table->string('pemilik');
            $table->string('pengelola');
            $table->string('no_telp');
            $table->string('no_hp');
            $table->string('npwp');
            $table->string('jurnal_id');
            $table->string('status_toko');
            $table->json('alamat');
            $table->json('distribusi'); // Multi
            $table->json('olshop'); // Multi
            $table->json('produk'); // Multi
            $table->json('material'); // Multi
            $table->unsignedBigInteger('kategori'); // Single
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('log_history_outlet');
    }
}
