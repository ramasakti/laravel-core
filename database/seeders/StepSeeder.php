<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("master_step")->insert([
            'label' => 'Jenis dan Tipe Outlet',
            'order'=> 1,
            'active'=> TRUE,
        ]);

        DB::table("master_step")->insert([
            'label' => 'Identitas Outlet',
            'order'=> 2,
            'active'=> TRUE,
        ]);

        DB::table("master_step")->insert([
            'label' => 'Bangunan / Fisik Outlet',
            'order'=> 3,
            'active'=> TRUE,
        ]);

        DB::table("master_step")->insert([
            'label' => 'Penjualan',
            'order'=> 4,
            'active'=> TRUE,
        ]);
    }
}
