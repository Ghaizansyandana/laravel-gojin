@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Transaksi</h1>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-select" required>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" 
                        {{ $transaksi->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control" value="{{ $transaksi->tanggal_transaksi }}" required>
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="number" name="total_harga" id="total_harga" class="form-control" value="{{ $transaksi->total_harga }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
