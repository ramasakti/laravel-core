<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(UserGroupSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MasterActionSeeder::class);
        $this->call(ButtonSeeder::class);
        $this->call(ActionSeeder::class);
        $this->call(DataMasterSeeder::class);
        $this->call(UserAreaSeeder::class);
        $this->call(StepSeeder::class);
        $this->call(QuestionSeeder::class);
       // \App\Models\User::factory(10)->create();
    }
}
