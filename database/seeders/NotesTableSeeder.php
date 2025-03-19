<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->insert([
            ['user_id'=>1, 'title' => 'Laravel Seeder','body'=>'pp aa','created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>1, 'title' => 'Shopp list','body'=>'pp ahjghjgja','created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>2, 'title' => 'Project idea','body'=>'ppjgjgj aa','created_at'=>now(),'updated_at'=>now()],



        ]);
    }
}
