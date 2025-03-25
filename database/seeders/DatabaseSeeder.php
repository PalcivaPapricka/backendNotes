<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           UsersTableSeeder::class,
           CategoriesTableSeeder::class,
           NotesTableSeeder::class,
           TableCategorySeeder::class,



        ]);


        $categories = Category::factory(10)>create();
    }
}
