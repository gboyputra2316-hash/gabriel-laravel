<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Buku Kategori Pemrograman (category_id = 1)
        Book::create([
            'category_id' => 1,
            'title' => 'Belajar Laravel 11',
            'author_name' => 'Andi Wijaya',
            'price' => 95000,
        ]);
        Book::create([
            'category_id' => 1,
            'title' => 'Mastering Python',
            'author_name' => 'Budi Santoso',
            'price' => 120000,
        ]);

        // Buku Kategori Novel (category_id = 2)
        Book::create([
            'category_id' => 2,
            'title' => 'Laskar Pelangi',
            'author_name' => 'Andrea Hirata',
            'price' => 85000,
        ]);
        Book::create([
            'category_id' => 2,
            'title' => 'Bumi',
            'author_name' => 'Tere Liye',
            'price' => 90000,
        ]);

        // Buku Kategori Komik (category_id = 3)
        Book::create([
            'category_id' => 3,
            'title' => 'Doraemon Vol. 1',
            'author_name' => 'Fujiko F. Fujio',
            'price' => 40000,
        ]);
        Book::create([
            'category_id' => 3,
            'title' => 'Naruto Vol. 1',
            'author_name' => 'Masashi Kishimoto',
            'price' => 45000,
        ]);
    }
}