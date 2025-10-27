<?php

namespace App\Http\Controllers;

use App\Models\Wali; // Pastikan model Wali sudah ada
use Illuminate\Http\Request;

class WaliController extends Controller
{
    // READ: Menampilkan daftar semua data wali
    public function index()
    {
        $walis = Wali::latest()->get();
        return view('wali.index', compact('walis'));
    }

    // CREATE: Menampilkan form untuk menambah data baru
    public function create()
    {
        return view('wali.create');
    }

    // CREATE: Menyimpan data baru ke database
// app/Http/Controllers/WaliController.php

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_wali' => 'required|max:100',
            'alamat' => 'required',
            'no_telepon' => 'nullable|unique:walis',
        ]);

     

        Wali::create($validated);

        return redirect()->route('wali.index')->with('success', 'Data Wali berhasil ditambahkan!');
    }

    // READ: Menampilkan detail data tertentu (optional)
    public function show(string $id)
    {
        $wali = Wali::findOrFail($id);
        return view('wali.show', compact('wali'));
    }

    // UPDATE: Menampilkan form edit
    public function edit(string $id)
    {
        $wali = Wali::findOrFail($id);
        return view('wali.edit', compact('wali'));
    }

    // UPDATE: Menyimpan perubahan data ke database
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_wali' => 'required|max:100',
            'alamat' => 'required',
            // Abaikan ID saat validasi unique
            'no_telepon' => 'nullable|unique:walis,no_telepon,' . $id,
        ]);

        $wali = Wali::findOrFail($id);
        $wali->update($validated);

        return redirect()->route('wali.index')->with('success', 'Data Wali berhasil diupdate!');
    }

    // DELETE: Menghapus data
    public function destroy(string $id)
    {
        $wali = Wali::findOrFail($id);
        $wali->delete();

        return redirect()->route('wali.index')->with('success', 'Data Wali berhasil dihapus!');
    }
}