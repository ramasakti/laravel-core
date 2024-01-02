<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Master Data',
                'order' => 1,
                'icons' => 'server',
                'status' => 'active',
            ]);

        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Users',
                'order' => 7,
                'icons' => 'people',
                'status' => 'active',
            ]);
            
        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Settings',
                'order' => 8,
                'icons' => 'file-earmark-bar-graph',
                'status' => 'active',
            ]);

        DB::table('menu_sections')
            ->insert([
                'name_section' => 'DB Outlet',
                'order' => 9,
                'icons' => 'menu-button-wide-fill',
                'status' => 'active',
            ]);
        
        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Survey',
                'order' => 10,
                'icons' => 'menu-button-wide-fill',
                'status' => 'active',
            ]);
        
        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Question',
                'order' => 11,
                'icons' => 'chat-dots',
                'status' => 'active',
            ]);
    }
}
