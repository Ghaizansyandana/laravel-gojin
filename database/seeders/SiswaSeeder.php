<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            ['nis' => '12345', 'nama' => 'Budi', 'kelas' => '10A', 'alamat' => 'Jl. Merdeka 1', 'tanggal_lahir' => '2005-05-15'],
            ['nis' => '12346', 'nama' => 'Siti', 'kelas' => '10B', 'alamat' => 'Jl. Merdeka 2', 'tanggal_lahir' => '2005-06-20'],
            ['nis' => '12347', 'nama' => 'Andi', 'kelas' => '10A', 'alamat' => 'Jl. Merdeka 3', 'tanggal_lahir' => '2005-07-25'],
            ['nis' => '12348', 'nama' => 'Rina', 'kelas' => '10C', 'alamat' => 'Jl. Merdeka 4', 'tanggal_lahir' => '2005-08-30'],
            ['nis' => '12349', 'nama' => 'Dewi', 'kelas' => '10B', 'alamat' => 'Jl. Merdeka 5', 'tanggal_lahir' => '2005-09-10'],
        ];

        DB::table('siswa')->insert($siswa);
    }
}
