<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobi;
use App\Models\Mahasiswa;

class HobiController extends Controller
{
    /**
     * Show many-to-many relation between Hobi and Mahasiswa
     */
    public function manyToMany()
    {
        // Return Mahasiswa with their hobis so the view can iterate mahasiswa
        $mahasiswas = Mahasiswa::with('hobis')->get();

        if (view()->exists('relasi.many_to_many')) {
            return view('relasi.many_to_many', compact('mahasiswas'));
        }

        return response()->json(['mahasiswas' => $mahasiswas]);
    }
}
