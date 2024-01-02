<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admininstrator',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'status' => 'active'
            ],
            [
                'name' => 'Sales TO',
                'username' => 'salesto',
                'password' => Hash::make('salesto'),
                'status' => 'active'
            ],
            [
                'name' => 'Sales Area',
                'username' => 'salesarea',
                'password' => Hash::make('salesarea'),
                'status' => 'active'
            ],
            [
                'name' => 'Sales Pusat',
                'username' => 'salespusat',
                'password' => Hash::make('salespusat'),
                'status' => 'active'
            ],
            [
                'name' => 'Kepala Cabang',
                'username' => 'kacab',
                'password' => Hash::make('kacab'),
                'status' => 'active'
            ],
            [
                'name' => 'Kepala Sales',
                'username' => 'kasales',
                'password' => Hash::make('kasales'),
                'status' => 'active'
            ],
            [
                'name' => 'Manajer Marketing',
                'username' => 'manajer',
                'password' => Hash::make('manajer'),
                'status' => 'active'
            ],
        ]);
    }
}
