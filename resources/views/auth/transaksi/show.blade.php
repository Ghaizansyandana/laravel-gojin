@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Transaksi</h1>

    <div class="card p-4">
        <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
        <p><strong>Nama Pelanggan:</strong> {{ $transaksi->pelanggan->nama ?? '-' }}</p>
        <p><strong>Tanggal:</strong> {{ $transaksi->tanggal_transaksi }}</p>
        <p><strong>Total:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
    </div>

    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
