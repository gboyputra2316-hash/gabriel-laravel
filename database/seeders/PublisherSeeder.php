<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Mengisi tabel publishers dengan data contoh.
     */
    public function run(): void
    {
        Publisher::create(['name' => 'Gramedia Pustaka Utama', 'city' => 'Jakarta']);
        Publisher::create(['name' => 'Andi Offset', 'city' => 'Yogyakarta']);
        Publisher::create(['name' => 'Bentang Pustaka', 'city' => 'Yogyakarta']);
    }
}
