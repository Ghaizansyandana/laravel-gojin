<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            ['title' => 'Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['title' => 'Belajar PHP', 'content' => 'Lorem Ipsum'],
            ['title' => 'Belajar JavaScript', 'content' => 'Lorem Ipsum'],
        ];

        DB::table('posts')->insert($posts);
    }
}
