<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen1 = Dosen::create([
            'nama' => 'Prof. Gojin Rebel',
            'nipd' => 'D001'
        ]);
        $dosen2 = Dosen::create([
                    'nama' => 'Prof. Tarman',
                    'nipd' => 'D002'
                ]);
        
        $dosen1->mahasiswas()->createMany([
            ['nama' => 'Ghaizan Aulia', 'nim' => '123458'],
            ['nama' => 'Aulia', 'nim' => '123459'],
        ]);

        $dosen2->mahasiswas()->createMany([
            ['nama' => 'Riski Null', 'nim' => '126838'],
            ['nama' => 'Opik Sadboi', 'nim' => '176176'],
        ]);
    }
}
