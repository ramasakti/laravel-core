<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 1,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 6,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 7,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 9,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 14,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 8,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 13,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 11,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 12,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 16,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 17,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 18,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 19,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 20,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 21,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 22,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 24,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 25,
            'required' => TRUE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 26,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 27,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 28,
            'required' => FALSE,
        ]);
        
        DB::table("list_question")->insert([
            'jenis_outlet' => 1,
            'question_id' => 29,
            'required' => FALSE,
        ]);

        $existing = DB::table('list_question')->select('question_id')->get()->toArray();
        $master_question = DB::table('master_question')->whereNotIn('id', array_column($existing, 'question_id'))->get();
        foreach ($master_question as $item) {
            DB::table("list_question")->insert([
                'jenis_outlet' => 1,
                'question_id' => $item->id,

                'required' => FALSE,
            ]);    
        }
    }
}
