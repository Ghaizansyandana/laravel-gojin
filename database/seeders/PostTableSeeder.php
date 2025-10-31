<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ✅ ini penting

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // hapus semua data lama di tabel posts
        DB::table('posts')->delete();

        // data baru
        $posts = [
            ['title' => 'Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['title' => 'Tips Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['title' => 'Jadwal Latihan Workout Bulanan', 'content' => 'Lorem Ipsum'],
        ];

        // masukkan data ke tabel posts
        DB::table('posts')->insert($posts);
    }
}
