<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function hello() 
    {
        $nama = "Gojin";
        $umur = 16;

        return view('hello', compact('nama', 'umur'));
    }

    public function siswa(){
        $data = [
            ['nama' => 'Gojin', 'kelas' => 'XI RPL 3'],
            ['nama' => 'Asep', 'kelas' => 'XI RPL 1'],
            ['nama' => 'Udin', 'kelas' => 'XI RPL 1'],
        ];

        return view('siswa', compact('data'));
    }
}
