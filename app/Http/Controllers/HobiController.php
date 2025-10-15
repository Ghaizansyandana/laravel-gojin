<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobi;
use App\Models\Mahasiswa;

class HobiController extends Controller
{
    public function index()
    {
        $hobis = \App\Models\Hobi::all();
        return view('hobi.index', compact('hobis'));
    }

    // Backwards-compatible alias/action to satisfy callers expecting a "dosen" method.
    // If an ID is eventually passed, the route should be updated to point to a dedicated show() method.
    public function hobi()
    {
        $hobis = Hobi::all();
        return view('hobi.index', compact('hobis'));
    }


    public function create()
    {
        return view('hobi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hobi' => 'required'
        ]);

        Hobi::create($request->all());

        return redirect()->route('hobi.index')->with('success', 'Data hobi berhasil ditambahkan.');
    }

    public function edit(Hobi $hobi)
    {
        return view('hobi.edit', compact('hobi'));
    }

    public function update(Request $request, Hobi $hobi)
    {
        $request->validate([
            'nama_hobi' => 'required'
        ]);

        $hobi->update($request->all());

        return redirect()->route('hobi.index')->with('success', 'Data hobi berhasil diperbarui.');
    }

    public function destroy(Hobi $hobi)
    {
        $hobi->delete();
        return redirect()->route('hobi.index')->with('success', 'Data hobi berhasil dihapus.');
    }
    
    /**
     * Display the specified Hobi.
     */
    public function show(Hobi $hobi)
    {
        return view('hobi.show', compact('hobi'));
    }
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
