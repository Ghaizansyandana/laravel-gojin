<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = \App\Models\Dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    // Backwards-compatible alias/action to satisfy callers expecting a "dosen" method.
    // If an ID is eventually passed, the route should be updated to point to a dedicated show() method.
    public function dosen()
    {
        $dosens = Dosen::all();
        return view('dosen.index', compact('dosens'));
    }


    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nipd' => 'required|unique:dosens'
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required',
            'nipd' => 'required|unique:dosens,nipd,' . $dosen->id
        ]);

        $dosen->update($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}

