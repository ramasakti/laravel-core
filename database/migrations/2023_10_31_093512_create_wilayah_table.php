<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('wilayah')) {
            Schema::create('wilayah', function (Blueprint $table) {
                $table->id();
                $table->string('province');
                $table->string('city');
                $table->string('district');
                $table->string('subdistrict');
                $table->string('postal_code');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('wilayah')) {
            // Jangan hapus tabel 'wilayah'
            // Anda juga dapat menambahkan kode lain di sini, seperti menghapus data dalam tabel.
        } else {
            Schema::dropIfExists('wilayah');
        }
    }
}
