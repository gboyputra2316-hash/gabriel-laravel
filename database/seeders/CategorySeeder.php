<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['id' => 1, 'name' => 'Pemrograman']);
        Category::create(['id' => 2, 'name' => 'Novel']);
        Category::create(['id' => 3, 'name' => 'Komik']);
    }
}