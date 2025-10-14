<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Wali;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $mahasiswa = Mahasiswa::create([
            'nama' => 'Ghaizan Aulia',
            "nim"  => '123456'
        ]);

        Wali::create([
            'nama' => 'pak gojin',
            'id_mahasiswa' => $mahasiswa->id
        ]);
    }
}
