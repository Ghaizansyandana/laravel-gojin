<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class RelasiController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('wali')->get();
        return view('relasi.one_to_one', compact('mahasiswas'));
    }

    /**
     * Show one-to-many relation example.
     *
     * This method is added so routes that call RelasiController@OneToMany
     * will not fail. It attempts to eager load a common one-to-many relation
     * (for example 'hobi' or 'hobbys') and falls back to all Mahasiswa records.
     */
    public function OneToMany()
    {
        // Load Dosen with their related Mahasiswa (one-to-many)
        $dosens = Dosen::with('mahasiswas')->get();

        // Return the view with variable name expected by the blade template
        return view('relasi.one_to_many', compact('dosens'));
    }

    public function manyToMany()
    {
        $mahasiswas = Mahasiswa::with('hobis')->get();
        return view('relasi.many_to_many', compact('mahasiswas'));
    }

    public function eloquent()
    {
        // Eager load the correct relations and return the specific sub-view
        $mahasiswa = Mahasiswa::with('wali', 'dosen', 'hobis')->get();
        return view('relasi.eloquent', compact('mahasiswa'));
    }
}
