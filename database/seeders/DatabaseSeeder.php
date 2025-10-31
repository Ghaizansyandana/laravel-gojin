<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Contoh: kalau nanti kamu punya seeder pelanggan atau produk, panggil di sini
        $this->call(PostTableSeeder::class);


        // Sementara biarkan kosong dulu
    }
}
