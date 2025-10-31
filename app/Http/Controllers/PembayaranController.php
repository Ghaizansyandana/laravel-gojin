<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use App\Models\Pelanggan;

class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar pembayaran
     */
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('auth.pembayaran.index', compact('pembayarans'));
    }

    /**
     * Menampilkan form create pembayaran
     */
    public function create()
    {
        // Ambil transaksi yang belum dibayar (tidak memiliki relasi pembayaran)
        $transaksis = Transaksi::doesntHave('pembayaran')->get();

        // Ambil semua pelanggan
        $pelanggans = Pelanggan::all();

        return view('auth.pembayaran.create', compact('transaksis', 'pelanggans'));
    }

    /**
     * Menyimpan data pembayaran
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'metode' => 'required|string',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        // Ambil transaksi untuk menghitung kembalian
        $transaksi = Transaksi::findOrFail($request->transaksi_id);

        // Gunakan kolom total_harga dari transaksi
        $total = $transaksi->total_harga ?? 0;

        $kembalian = $request->jumlah_bayar - $total;

        // Simpan pembayaran
        Pembayaran::create([
            'transaksi_id' => $request->transaksi_id,
            'pelanggan_id' => $request->pelanggan_id,
            'metode' => $request->metode,
            'jumlah_bayar' => $request->jumlah_bayar,
            'kembalian' => $kembalian,
        ]);

        return redirect()->route('pembayaran.index')
                         ->with('success', 'Pembayaran berhasil disimpan!');
    }
}
