<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LatihanSeeder extends Seeder
{
    public function run(): void
    {
        $post = [
            ['title' => 'Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['title' => 'Belajar PHP', 'content' => 'Lorem Ipsum'],
            ['title' => 'Belajar JavaScript', 'content' => 'Lorem Ipsum'],
        ];

        // Bedanya di sini: insertOrIgnore
        DB::table('posts')->insertOrIgnore($post);
    }
}


