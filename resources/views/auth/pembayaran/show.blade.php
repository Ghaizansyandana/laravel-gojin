@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detail Pembayaran</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID Pembayaran:</strong> {{ $pembayaran->id }}</p>
            <p><strong>ID Transaksi:</strong> {{ $pembayaran->transaksi_id }}</p>
            <p><strong>Tanggal Bayar:</strong> {{ $pembayaran->tanggal_bayar }}</p>
            <p><strong>Total Bayar:</strong> Rp {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}</p>
            <p><strong>Metode:</strong> {{ ucfirst($pembayaran->metode) }}</p>
            <p><strong>Status:</strong> 
                @if($pembayaran->status == 'lunas')
                    <span class="badge bg-success">Lunas</span>
                @else
                    <span class="badge bg-warning text-dark">Pending</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
