<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditLogoutletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("log_history_outlet", function (Blueprint $table) {
            $table->string("action")->after("kategori");
            $table->string("accno")->after("id_outlet");
            $table->integer('jenis_outlet_id')->after('action');
            $table->integer('tipe_outlet_id')->after('jenis_outlet_id')->nullable();
            $table->integer('tipe_pembelian_id')->after('tipe_outlet_id')->nullable();
            $table->integer('kategori_outlet_id')->after('tipe_pembelian_id')->nullable();
            $table->unsignedBigInteger('jumlah_santri_id')->nullable();
            $table->unsignedBigInteger('jumlah_karyawan_id')->nullable();
            $table->unsignedBigInteger('jumlah_anggota_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
