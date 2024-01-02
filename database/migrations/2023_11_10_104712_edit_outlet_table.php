<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditOutletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outlet', function (Blueprint $table) {
            $table->unsignedBigInteger('jumlah_santri_id')->nullable();
            $table->unsignedBigInteger('jumlah_karyawan_id')->nullable();
            $table->unsignedBigInteger('jumlah_anggota_id')->nullable();
            $table->boolean('verified');
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
