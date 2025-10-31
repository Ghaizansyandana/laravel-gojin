<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
   
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('auth.pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('auth.pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_hp' => 'required|string|unique:pelanggans,no_hp',
            'alamat' => 'required|string|max:255',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

     
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('auth.pelanggan.show', compact('pelanggan'));
    }

    // ✏️ Form edit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('auth.pelanggan.edit', compact('pelanggan'));
    }

    // 🔁 Update data pelanggan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_hp' => 'required|string|unique:pelanggans,no_hp,' . $id,
            'alamat' => 'required|string|max:255',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    // 🗑️ Hapus pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
    }
}
