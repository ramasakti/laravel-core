<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Olshop
        DB::table('master_olshop')
            ->insert([
                'olshop' => 'Shopee',
                'active' => true
            ]);
        DB::table('master_olshop')
            ->insert([
                'olshop' => 'Tokopedia',
                'active' => true
            ]);
        DB::table('master_olshop')
            ->insert([
                'olshop' => 'Lazada',
                'active' => true
            ]);
        DB::table('master_olshop')
            ->insert([
                'olshop' => 'Tiktok',
                'active' => true
            ]);

        // Distribusi
        DB::table('master_distribusi')
            ->insert([
                'jalur_distribusi' => 'Agen',
                'active' => true
            ]);
        DB::table('master_distribusi')
            ->insert([
                'jalur_distribusi' => 'Retail',
                'active' => true
            ]);
        DB::table('master_distribusi')
            ->insert([
                'jalur_distribusi' => 'Grosir',
                'active' => true
            ]);
        DB::table('master_distribusi')
            ->insert([
                'jalur_distribusi' => 'Grosir + Retail',
                'active' => true
            ]);

        // Jenis
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Tradisional',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Institusi - B2B',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Institusi - B2G',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Institusi - Ponpes',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Institusi - Koperasi',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Institusi - Partai',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Modern Market',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Supermarket',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Minimarket',
                'active' => true
            ]);
        DB::table('master_jenis_outlet')
            ->insert([
                'kode' => '',
                'jenis' => 'Semi Modern Market',
                'active' => true
            ]);

        // Lokasi
        DB::table('master_lokasi')
            ->insert([
                'lokasi' => 'Pasar',
                'active' => true
            ]);
        DB::table('master_lokasi')
            ->insert([
                'lokasi' => 'Jalan Utama',
                'active' => true
            ]);
        DB::table('master_lokasi')
            ->insert([
                'lokasi' => 'Pusat Perbelanjaan',
                'active' => true
            ]);

        // Luas
        DB::table('master_luas')
            ->insert([
                'luas' => '< 10 m^2',
                'active' => true
            ]);
        DB::table('master_luas')
            ->insert([
                'luas' => '10 - 20 m^2',
                'active' => true
            ]);
        DB::table('master_luas')
            ->insert([
                'luas' => '> 20 m^2',
                'active' => true
            ]);

        // Jenis Produk
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Sarung',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Songkok',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Bamus',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Subaiyah',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Sprei',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Batik',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Hijab',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Mukenah',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Sajadah',
                'active' => true
            ]);
        DB::table('master_jenis_produk')
            ->insert([
                'produk' => 'Longdress',
                'active' => true
            ]);

        // merk
        DB::table('master_merk')
            ->insert([
                'merk' => 'BHS',
                'sub_merk' => 'BHS A',
                'jenis_produk_id' => 1,
                'active' => true
            ]);
        DB::table('master_merk')
            ->insert([
                'merk' => 'Mangga',
                'sub_merk' => 'Gadung',
                'jenis_produk_id' => 1,
                'active' => true
            ]);
        DB::table('master_merk')
            ->insert([
                'merk' => 'Mangga ',
                'sub_merk' => 'Manalagi',
                'jenis_produk_id' => 1,
                'active' => true
            ]);
        DB::table('master_merk')
            ->insert([
                'merk' => 'Gajah Duduk',
                'sub_merk' => 'Manis',
                'jenis_produk_id' => 2,
                'active' => true
            ]);
        DB::table('master_merk')
            ->insert([
                'merk' => 'Zara',
                'sub_merk' => 'Zakar',
                'jenis_produk_id' => 7,
                'active' => true
            ]);
        DB::table('master_merk')
            ->insert([
                'merk' => 'Denis',
                'sub_merk' => 'Kancil',
                'jenis_produk_id' => 8,
                'active' => true
            ]);

        // Upline
        DB::table('master_upline')
            ->insert([
                'upline' => 'Upline 1',
                'active' => true
            ]);
        DB::table('master_upline')
            ->insert([
                'upline' => 'Upline 1',
                'active' => true
            ]);
        DB::table('master_upline')
            ->insert([
                'upline' => 'Upline 2',
                'active' => true
            ]);
        DB::table('master_upline')
            ->insert([
                'upline' => 'Upline 3',
                'active' => true
            ]);
        DB::table('master_upline')
            ->insert([
                'upline' => 'Upline 4',
                'active' => true
            ]);
        DB::table('master_upline')
            ->insert([
                'upline' => 'Upline 5',
                'active' => true
            ]);
        DB::table('master_upline')
            ->insert([
                'upline' => 'Lain Lain',
                'active' => true
            ]);

        // Kategori
        DB::table('master_kategori')
            ->insert([
                'kategori' => 'A',
                'active' => true
            ]);
        DB::table('master_kategori')
            ->insert([
                'kategori' => 'B',
                'active' => true
            ]);
        DB::table('master_kategori')
            ->insert([
                'kategori' => 'C',
                'active' => true
            ]);
        DB::table('master_kategori')
            ->insert([
                'kategori' => 'D',
                'active' => true
            ]);
        DB::table('master_kategori')
            ->insert([
                'kategori' => 'E',
                'active' => true
            ]);

        // Bangunan
        DB::table('master_bangunan')
            ->insert([
                'bangunan' => '1 Lantai',
                'active' => true
            ]);
        DB::table('master_bangunan')
            ->insert([
                'bangunan' => '2 Lantai',
                'active' => true
            ]);
        DB::table('master_bangunan')
            ->insert([
                'bangunan' => '> 2 Lantai',
                'active' => true
            ]);

        // Jenis Promosi
        DB::table('master_material_promo')
            ->insert([
                'material' => 'PNT',
                'active' => true
            ]);
        DB::table('master_material_promo')
            ->insert([
                'material' => 'Banner',
                'active' => true
            ]);
        DB::table('master_material_promo')
            ->insert([
                'material' => 'Flag Chain',
                'active' => true
            ]);
        DB::table('master_material_promo')
            ->insert([
                'material' => 'Rak Display',
                'active' => true
            ]);
        DB::table('master_material_promo')
            ->insert([
                'material' => 'TV Display',
                'active' => true
            ]);

        // Tipe Pembelian
        DB::table('master_tipe_pembelian')
            ->insert([
                'tipe_pembelian' => 'Seragam',
                'active' => true
            ]);
        DB::table('master_tipe_pembelian')
            ->insert([
                'tipe_pembelian' => 'CSR',
                'active' => true
            ]);
        DB::table('master_tipe_pembelian')
            ->insert([
                'tipe_pembelian' => 'Komunitas',
                'active' => true
            ]);
        DB::table('master_tipe_pembelian')
            ->insert([
                'tipe_pembelian' => 'Gift',
                'active' => true
            ]);
        DB::table('master_tipe_pembelian')
            ->insert([
                'tipe_pembelian' => 'Promosi',
                'active' => true
            ]);

        // Karyawan
        DB::table('master_karyawans')
            ->insert([
                'karyawan' => '< 1000',
                'active' => true
            ]);
        DB::table('master_karyawans')
            ->insert([
                'karyawan' => '1000 - 5000',
                'active' => true
            ]);
        DB::table('master_karyawans')
            ->insert([
                'karyawan' => '> 5000',
                'active' => true
            ]);

        // Ponpes
        DB::table('master_santris')
            ->insert([
                'santri' => '< 1000',
                'active' => true
            ]);
        DB::table('master_santris')
            ->insert([
                'santri' => '1000 - 5000',
                'active' => true
            ]);
        DB::table('master_santris')
            ->insert([
                'santri' => '> 5000',
                'active' => true
            ]);

        // Koperasi
        DB::table('master_anggota_koperasis')
            ->insert([
                'anggota_koperasi' => '< 1000',
                'active' => true
            ]);
        DB::table('master_anggota_koperasis')
            ->insert([
                'anggota_koperasi' => '1000 - 5000',
                'active' => true
            ]);
        DB::table('master_anggota_koperasis')
            ->insert([
                'anggota_koperasi' => '> 5000',
                'active' => true
            ]);
    }
}
