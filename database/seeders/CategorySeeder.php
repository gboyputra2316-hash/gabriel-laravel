<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::firstOrCreate(['name' => 'Pemrograman']);
        Category::firstOrCreate(['name' => 'Novel']);
        Category::firstOrCreate(['name' => 'Komik']);
    }
}