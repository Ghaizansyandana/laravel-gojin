<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $detail = DetailTransaksi::with(['transaksi', 'produk'])->get();
        return view('auth.detail_transaksi.index', compact('details'));

    }

    public function create()
    {
        $transaksi = Transaksi::all();
        $produk = Produk::all();
        return view('detail_transaksi.create', compact('transaksi', 'produk'));
    }

    public function store(Request $request)
    {
        $produk = Produk::find($request->produk_id);
        $subtotal = $produk->harga * $request->jumlah;

        DetailTransaksi::create([
            'transaksi_id' => $request->transaksi_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'subtotal' => $subtotal,
        ]);

        // Update total_harga di transaksi
        $transaksi = Transaksi::find($request->transaksi_id);
        $transaksi->total_harga += $subtotal;
        $transaksi->save();

        return redirect()->route('detail-transaksi.index');
    }

    public function show($id)
    {
        $detail = DetailTransaksi::with(['transaksi', 'produk'])->findOrFail($id);
        return view('detail_transaksi.show', compact('detail'));
    }

    public function edit($id)
    {
        $detail = DetailTransaksi::findOrFail($id);
        $transaksi = Transaksi::all();
        $produk = Produk::all();
        return view('detail_transaksi.edit', compact('detail', 'transaksi', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $detail = DetailTransaksi::findOrFail($id);
        $produk = Produk::find($request->produk_id);
        $subtotal = $produk->harga * $request->jumlah;

        $detail->update([
            'transaksi_id' => $request->transaksi_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('detail-transaksi.index');
    }

    public function destroy($id)
    {
        DetailTransaksi::destroy($id);
        return redirect()->route('detail-transaksi.index');
    }
}
