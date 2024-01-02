<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_area')
            ->insert([
                'user_id' => 1,
                'nasional' => TRUE,
                'prov' => '',
                'kota' => '',
                'kec' => ''
            ]);
        DB::table('user_area')
            ->insert([
                'user_id' => 2,
                'nasional' => FALSE,
                'prov' => 'Jawa Timur',
                'kota' => 'Surabaya',
                'kec' => 'Tegalsari'
            ]);
        DB::table('user_area')
            ->insert([
                'user_id' => 2,
                'nasional' => FALSE,
                'prov' => 'Jawa Timur',
                'kota' => 'Sidoarjo',
                'kec' => 'Waru'
            ]);
    }
}
