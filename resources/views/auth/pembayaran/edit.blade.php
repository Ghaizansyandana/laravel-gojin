@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Pembayaran</h2>

    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Transaksi</label>
            <select name="transaksi_id" class="form-select" required>
                @foreach($transaksis as $transaksi)
                    <option value="{{ $transaksi->id }}" {{ $transaksi->id == $pembayaran->transaksi_id ? 'selected' : '' }}>
                        #{{ $transaksi->id }} - {{ $transaksi->pelanggan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" value="{{ $pembayaran->tanggal_bayar }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Bayar</label>
            <input type="number" name="total_bayar" value="{{ $pembayaran->total_bayar }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <select name="metode" class="form-select" required>
                <option value="cash" {{ $pembayaran->metode == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="transfer" {{ $pembayaran->metode == 'transfer' ? 'selected' : '' }}>Transfer</option>
                <option value="qris" {{ $pembayaran->metode == 'qris' ? 'selected' : '' }}>QRIS</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $pembayaran->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="lunas" {{ $pembayaran->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
