<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListMaterialPromosiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_material_promosi', function (Blueprint $table) {
            $table->id();
            $table->string('outlet_id');
            $table->unsignedBigInteger('material_id');
            $table->foreign('outlet_id')->references('id_outlet')->on('outlet');
            $table->foreign('material_id')->references('id')->on('master_material_promo');
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
        Schema::dropIfExists('list_material_promosi');
    }
}
