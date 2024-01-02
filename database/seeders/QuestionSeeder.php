<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_question')
            ->insert([
                'id' => 1,
                'table' => 'outlet',
                'component' => 'tipe_outlet_id',
                'label' => 'Tipe Distribusi',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 1
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 2,
                'table' => 'outlet',
                'component' => 'tipe_pembelian_id',
                'label' => 'Tipe Pembelian',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 1
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 3,
                'table' => 'outlet',
                'component' => 'jumlah_santri_id',
                'label' => 'Jumlah Santri',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 1
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 4,
                'table' => 'outlet',
                'component' => 'jumlah_karyawan_id',
                'label' => 'Jumlah Karyawan',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 1
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 5,
                'table' => 'outlet',
                'component' => 'jumlah_anggota_id',
                'label' => 'Jumlah Anggota',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 1
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 6,
                'table' => 'outlet',
                'component' => 'kategori_outlet_id',
                'label' => 'Kategori Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 1
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 7,
                'table' => 'outlet',
                'component' => 'nama_outlet',
                'label' => 'Nama Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 8,
                'table' => 'outlet',
                'component' => 'pemilik',
                'label' => 'Pemilik Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 9,
                'table' => 'outlet',
                'component' => 'pengelola',
                'label' => 'Pengelola Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 10,
                'table' => 'outlet',
                'component' => 'accno',
                'label' => 'ACC NO',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 11,
                'table' => 'outlet',
                'component' => 'npwp',
                'label' => 'NPWP / NIK',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 12,
                'table' => 'outlet',
                'component' => 'no_telp',
                'label' => 'Telp. Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 13,
                'table' => 'outlet',
                'component' => 'hp_pemilik',
                'label' => 'No HP Pemilik',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 14,
                'table' => 'outlet',
                'component' => 'hp_pengelola',
                'label' => 'No HP Pengelola',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 16,
                'table' => 'alamat_outlet',
                'component' => 'alamat',
                'label' => 'Alamat Lengkap',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 17,
                'table' => 'alamat_outlet',
                'component' => 'provinsi',
                'label' => 'Provinsi',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 18,
                'table' => 'alamat_outlet',
                'component' => 'kota',
                'label' => 'Kab. / Kota',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 19,
                'table' => 'alamat_outlet',
                'component' => 'kecamatan',
                'label' => 'Kecamatan',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 20,
                'table' => 'alamat_outlet',
                'component' => 'kelurahan',
                'label' => 'Kelurahan',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 21,
                'table' => 'alamat_outlet',
                'component' => 'kode_pos',
                'label' => 'Kode Pos',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 2
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 22,
                'table' => 'alamat_outlet',
                'component' => 'lokasi_id',
                'label' => 'Lokasi Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 3
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 23,
                'table' => 'alamat_outlet',
                'component' => 'lat_long',
                'label' => 'Latitude / Longitude',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 3
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 24,
                'table' => 'alamat_outlet',
                'component' => 'link_map',
                'label' => 'Link Maps',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 3
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 25,
                'table' => 'alamat_outlet',
                'component' => 'foto',
                'label' => 'Foto Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 3
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 26,
                'table' => 'outlet',
                'component' => 'status_toko',
                'label' => 'Status Bangunan Toko',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 3
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 27,
                'table' => 'alamat_outlet',
                'component' => 'luas_outlet',
                'label' => 'Luas Ukuran Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 3
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 28,
                'table' => 'alamat_outlet',
                'component' => 'bangunan_outlet',
                'label' => 'Bangunan Outlet',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 3
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 29,
                'table' => 'list_upline',
                'component' => 'list_upline',
                'label' => 'Upline',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 4
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 30,
                'table' => 'list_olshop',
                'component' => 'olshop',
                'label' => 'Olshop',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 4
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 31,
                'table' => 'list_material_promosi',
                'component' => 'material_promo',
                'label' => 'Material Promosi',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 4
            ]);

        DB::table('master_question')
            ->insert([
                'id' => 32,
                'table' => 'list_jenis_produk',
                'component' => 'produk',
                'label' => 'Produk',
                'active' => TRUE,
                'order' => 1,
                'step_id' => 4
            ]);
    }
}
