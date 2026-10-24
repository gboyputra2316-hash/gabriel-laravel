<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Urutan penting: CategorySeeder dulu, baru BookSeeder --
        // tiap buku butuh category_id milik kategori yang sudah ada.
        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
            PublisherSeeder::class,
        ]);
    }
}
