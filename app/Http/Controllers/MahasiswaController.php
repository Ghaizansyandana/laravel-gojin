<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Hobi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
        {
            $dosen = \App\Models\Dosen::all();
            $hobi = \App\Models\Hobi::all();

            return view('mahasiswa.create', compact('dosen', 'hobi'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'id_dosen' => 'required|exists:dosens,id',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->id_dosen = $request->id_dosen;
        $mahasiswa->save();

        // attach (melampirkan banyak data atau many to many)
        $mahasiswa->hobis()->attach($request->hobi);
        return redirect()->route('mahasiswa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosen = Dosen::all();
        $hobi = Hobi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'dosen', 'hobi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        // PENTING: Penambahan ID untuk mengabaikan NIM saat update pada record yang sama
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim,' . $id,
            'id_dosen' => 'required|exists:dosens,id',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->id_dosen = $request->id_dosen;
        $mahasiswa->save();

        // sync memperbarui data yang diubah dari many to many
        $mahasiswa->hobis()->sync($request->hobi);
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        // detach (menghapus data yang terkait dari mahasiswa dan hobi)
        $mahasiswa->hobis()->detach();   
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}