<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $programming = Category::firstOrCreate(['name' => 'Pemrograman']);
        $novel = Category::firstOrCreate(['name' => 'Novel']);
        $comic = Category::firstOrCreate(['name' => 'Komik']);

        $books = [
            [$programming, 'Belajar Laravel 11', 'Andi Wijaya', 95000],
            [$programming, 'Mastering Python', 'Budi Santoso', 120000],
            [$novel, 'Laskar Pelangi', 'Andrea Hirata', 85000],
            [$novel, 'Bumi', 'Tere Liye', 90000],
            [$comic, 'Doraemon Vol. 1', 'Fujiko F. Fujio', 40000],
            [$comic, 'Naruto Vol. 1', 'Masashi Kishimoto', 45000],
        ];

        foreach ($books as [$category, $title, $author, $price]) {
            Book::firstOrCreate(
                ['title' => $title],
                [
                    'category_id' => $category->id,
                    'author_name' => $author,
                    'price' => $price,
                ],
            );
        }
    }
}