<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAcnoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outlet', function (Blueprint $table) {
            $table->dropColumn('acno');
            $table->string('accno')->nullable()->after('id_outlet');
        });
        Schema::table('survey', function (Blueprint $table) {
            $table->dropColumn('acno');
            $table->string('accno')->nullable()->after('id_outlet');
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
