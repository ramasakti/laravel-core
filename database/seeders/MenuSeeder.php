<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Core Data
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 2,
                'name_menu' => 'User',
                'url' => '/users',
                'icons' => '',
                'order' => 1,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 2,
                'name_menu' => 'User Area',
                'url' => '/users-area',
                'icons' => '',
                'order' => 2,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 3,
                'name_menu' => 'Group',
                'url' => '/group',
                'icons' => '',
                'order' => 1,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 3,
                'name_menu' => 'Create Section',
                'url' => '/create-section',
                'icons' => '',
                'order' => 2,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 3,
                'name_menu' => 'Aksi',
                'url' => '/action',
                'icons' => '',
                'order' => 3,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 3,
                'name_menu' => 'Tombol',
                'url' => '/button',
                'icons' => '',
                'order' => 4,
                'status' => 'active',
            ]);

        // Master Data
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Olshop',
                'url' => '/olshop',
                'icons' => '',
                'order' => 1,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Tipe Pembelian',
                'url' => '/tipe',
                'icons' => '',
                'order' => 2,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Merk',
                'url' => '/merk',
                'icons' => '',
                'order' => 3,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Jenis',
                'url' => '/jenis',
                'icons' => '',
                'order' => 4,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Bangunan',
                'url' => '/bangunan',
                'icons' => '',
                'order' => 5,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Luas Bangunan',
                'url' => '/luas',
                'icons' => '',
                'order' => 6,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Lokasi',
                'url' => '/lokasi',
                'icons' => '',
                'order' => 7,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Tipe Distribusi',
                'url' => '/distribusi',
                'icons' => '',
                'order' => 8,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Produk',
                'url' => '/produk',
                'icons' => '',
                'order' => 9,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Material Promo',
                'url' => '/material',
                'icons' => '',
                'order' => 10,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Upline',
                'url' => '/upline',
                'icons' => '',
                'order' => 11,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Karyawan',
                'url' => '/karyawan',
                'icons' => '',
                'order' => 12,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Santri',
                'url' => '/santri',
                'icons' => '',
                'order' => 13,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 1,
                'name_menu' => 'Koperasi',
                'url' => '/koperasi',
                'icons' => '',
                'order' => 14,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 4,
                'name_menu' => 'Data Outlet',
                'url' => '/outlet',
                'icons' => '',
                'order' => 1,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 4,
                'name_menu' => 'Tambah Outlet',
                'url' => '/outlet/create',
                'icons' => '',
                'order' => 2,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 5,
                'name_menu' => 'Survey',
                'url' => '/survey',
                'icons' => '',
                'order' => 1,
                'status' => 'active',
            ]);
        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 6,
                'name_menu' => 'Pertanyaan Akses',
                'url' => '/pertanyaan-akses',
                'icons' => '',
                'order' => 1,
                'status' => 'active',
            ]);
    }
}
