@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Pembayaran</h2>

    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Transaksi</label>
            <select name="transaksi_id" class="form-select" required>
                <option value="">-- Pilih Transaksi --</option>
                @foreach($transaksis as $transaksi)
                    <option value="{{ $transaksi->id }}">#{{ $transaksi->id }} - {{ $transaksi->pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Bayar</label>
            <input type="number" name="total_bayar" class="form-control" placeholder="Masukkan total bayar" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <select name="metode" class="form-select" required>
                <option value="cash">Cash</option>
                <option value="transfer">Transfer</option>
                <option value="qris">QRIS</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="pending">Pending</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
