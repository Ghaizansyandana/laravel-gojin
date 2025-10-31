<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('auth.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('auth.transaksi.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'tanggal_transaksi' => 'required|date',
        ]);
        
        // Generate kode_transaksi if not provided
        $kode_transaksi = $request->kode_transaksi ?? 'TRX-' . date('YmdHis');
        
        $transaksi = Transaksi::create([
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_transaksi' => $request->tanggal_transaksi ?? now()->toDateString(),
            'total_harga' => 0,
            'kode_transaksi' => $kode_transaksi
        ]);

        return redirect()->route('transaksi.index');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('auth.transaksi.show', compact('transaksi'));
    }


    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pelanggans = Pelanggan::all();
        return view('auth.transaksi.edit', compact('transaksi', 'pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect()->route('transaksi.index');
    }
}
