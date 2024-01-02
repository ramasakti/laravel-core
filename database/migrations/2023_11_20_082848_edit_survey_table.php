<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey', function (Blueprint $table) {
            $table->string('acno')->after('id_outlet');
        });

        Schema::table('log_history_outlet', function (Blueprint $table) {
            $table->string('id_outlet')->after('id');
            $table->dropColumn('no_hp');
            $table->integer('distribusi')->nullable()->change();
            $table->string('hp_pemilik')->after('no_telp');
            $table->string('hp_pengelola')->after('hp_pemilik');
            $table->json('upline')->after('material');
        });

        Schema::table('button', function (Blueprint $table) {
            $table->string('position')->change();
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
