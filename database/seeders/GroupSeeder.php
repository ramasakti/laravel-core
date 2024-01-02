<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'name' => 'Admininstrator',
                'description' => 'Hak Akses untuk Admin',
            ],
            [
                'name' => 'Sales TO',
                'description' => 'Hak Akses untuk Sales TO',
            ],
            [
                'name' => 'Sales Area',
                'description' => 'Hak Akses untuk Sales Area',
            ],
            [
                'name' => 'Sales Pusat',
                'description' => 'Hak Akses untuk Sales Pusat',
            ],
            [
                'name' => 'Kepala Cabang',
                'description' => 'Hak Akses untuk Kepala Cabang',
            ],
            [
                'name' => 'Kepala Sales',
                'description' => 'Hak Akses untuk Kepala Sales',
            ],
            [
                'name' => 'Manajer Marketing',
                'description' => 'Hak Akses untuk Manajer Marketing',
            ],
        ]);
    }
}
