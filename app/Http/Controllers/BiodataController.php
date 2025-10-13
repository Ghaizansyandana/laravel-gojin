<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::latest()->paginate(10);
        return view('biodata.index', compact('biodata'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        //  Validasi form
        $this->validate($request, [
            'nama'       => 'required|string|max:100',
            'tgl_lahir'  => 'required|date',
            'jk'         => 'required|in:Laki-laki,Perempuan',
            'agama'      => 'required|in:Islam,Hindu,Katolik,Buddha,Konghucu',
            'alamat'     => 'required|string',
            'tb'         => 'required|numeric',
            'bb'         => 'required|numeric',
            'foto'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $biodata = new Biodata();
        $biodata->nama       = $request->nama;
        $biodata->tgl_lahir  = $request->tgl_lahir;
        $biodata->jk         = $request->jk;
        $biodata->agama      = $request->agama;
        $biodata->alamat     = $request->alamat;
        $biodata->tb         = $request->tb;
        $biodata->bb         = $request->bb;

        //  Upload foto ke storage
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/biodata', $foto->hashName());
            $biodata->foto = $foto->hashName();
        }

        $biodata->save();

        return redirect()->route('biodata.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view('biodata.show', compact('biodata'));
    }

    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view('biodata.edit', compact('biodata'));
    }

    public function update(Request $request, $id)
    {
        // ✅ Validasi form update
        $this->validate($request, [
            'nama'       => 'required|string|max:100',
            'tgl_lahir'  => 'required|date',
            'jk'         => 'required|in:Laki-laki,Perempuan',
            'agama'      => 'required|in:Islam,Hindu,Katolik,Buddha,Konghucu',
            'alamat'     => 'required|string',
            'tb'         => 'required|numeric',
            'bb'         => 'required|numeric',
            'foto'       => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $biodata = Biodata::findOrFail($id);

        $biodata->nama       = $request->nama;
        $biodata->tgl_lahir  = $request->tgl_lahir;
        $biodata->jk         = $request->jk;
        $biodata->agama      = $request->agama;
        $biodata->alamat     = $request->alamat;
        $biodata->tb         = $request->tb;
        $biodata->bb         = $request->bb;

        // Ganti foto kalau ada upload baru
        if ($request->hasFile('foto')) {
            if ($biodata->foto) {
                Storage::delete('public/biodata/' . $biodata->foto);
            }

            $foto = $request->file('foto');
            $foto->storeAs('public/biodata', $foto->hashName());
            $biodata->foto = $foto->hashName();
        }

        $biodata->save();

        return redirect()->route('biodata.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);

        // Hapus foto dari storage
        if ($biodata->foto) {
            Storage::delete('public/biodata/' . $biodata->foto);
        }

        $biodata->delete();

        return redirect()->route('biodata.index')->with('success', 'Data berhasil dihapus!');
    }
}
